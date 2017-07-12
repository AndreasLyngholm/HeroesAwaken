<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {

    #region manage
    public function manage()
    {
        if (Input::has('q'))
        {
            $words = explode(' ', $query =  Input::get('q'));
            $query = \DB::table('users');
            $queries = ['username' => true, 'email' => true];
            foreach ($queries as $group => $first)
            {
                foreach ($words as $word)
                {
                    if ($first)
                    {
                        $query->orWhere($group, 'like', "%$word%");
                        $first = false;
                    }
                    else
                        $query->where($group, 'like', "%$word%");
                }
            }
            $searchResults = $query->get();
        }
        if (Input::get('role'))
            $searchResults = User::whereIn('id', Role::find(Input::get('role'))->users()->pluck('id'))->get();
        return view('admin.users.management.list', compact('searchResults'));
    }

    public function details(User $user)
    {
        $roles = $user->roles()->pluck('id', 'title')->all();
        $applicableRoles = Role::whereNotIn('id', $roles)->pluck('title', 'id')->all();
        return view('admin.users.management.details', compact('user', 'roles', 'applicableRoles', 'payments'));
    }
    #endregion
    #region roles
    public function roles()
    {
        $roles = Role::all();
        foreach ($roles as $role)
        {
            unset($slugs);
            $permissions = array_pluck($role->permissions->toArray(), 'slug');
            foreach($permissions as $perm)
            {
                $splitted = explode('.', $perm);
                $slugs[$splitted[0]][] = $splitted[1];
            }
            $role->slugs = isset($slugs) ? $slugs : [];
        }
        return view('admin.users.roles.list', compact('roles'));
    }

    public function addRole()
    {
        $permissions = [];
        foreach(Permission::all() as $permission)
        {
            $parts = explode('.',$permission->slug);
            $permissions[ucfirst($parts[0])][] = ['access'=> ucfirst($parts[1]), 'description'=>$permission->description];

        }
        return view('admin.users.roles.add', compact('permissions'));

    }

    public function doAddRole(User $user)
    {
        $validation = \Validator::make(Input::all(), [
            'name' => 'required'
        ]);
        if ($validation->fails())
            return \Redirect::to(\URL::previous())->withErrors($validation)->withInput();
        $permissions = is_null(Input::get('permissions')) ? [] : Permission::whereIn('slug', array_keys(Input::get('permissions')))->pluck('id')->all();
        $role = new Role;
        $role->title = ucfirst(Input::get('name'));
        $role->slug = strtolower(Input::get('name'));
        $role->save();
        $role->permissions()->sync($permissions);
        return \Redirect::route('admin.user.roles')->withSuccess('The role has been created.');
    }
    #endregion

    #region assignRoles


    public function assignRole(User $user)
    {
        $user->roles()->attach(Input::get('role'));
        return redirect()->back();
    }

    public function removeRole(User $user, $roleId)
    {
        $user->roles()->detach($roleId);
        return redirect()->back();
    }

    #endregion

    public function banUser(User $user, $type, $expireAt)
    {
        $role = \Trinity\Role::whereSlug($type == "ban" ? "banned" : "restricted")->first()->id;
        $user->roles()->sync([$role => ['expire_at' => $expireAt . " 01:00:00"]]);
        \Trinity\Task::create([
            'type' => 'grantPrivilege',
            'run_at' => $expireAt . " 01:00:00",
            'task' => ['to' => ['user' => $user->id, 'privilege' => 1]],
            'state' => 'awaiting',
            'issued_by' => auth()->id()
        ]);
        return redirect()->back()->withSuccess('The user has been ' . ($type == "ban" ? "banned" : "restricted") . ".");
    }
}