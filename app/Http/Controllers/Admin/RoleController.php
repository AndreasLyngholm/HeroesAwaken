<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    /**
     * Show the details of a role
     */
    public function details($roleSlug)
    {
        $role = Role::where('slug', $roleSlug)->first();
        $permissions = [];
        foreach(Permission::all() as $permission) {
            $parts = explode('.',$permission->slug);
            $permissions[ucfirst($parts[0])][] = ['access'=> ucfirst($parts[1]), 'description'=>$permission->description];
        }
        return view('admin.users.roles.details', compact('role', 'permissions'));
    }

    public function update($roleSlug)
    {
        $validation = \Validator::make(Input::all(), [
            'name' => 'required',
            'slug'  => 'required',
        ]);
        if ($validation->fails())
            return \Redirect::to(\URL::previous())->withErrors($validation)->withInput();

        // TODO: Check if any other slug / title is taken (or make the title and slug unique in the db)
        $role = Role::where('slug', $roleSlug)->first();
        $permissions = is_null(Input::get('permissions')) ? [] : Permission::whereIn('slug', array_keys(Input::get('permissions')))->pluck('id')->all();

        $role->title = ucfirst(Input::get('name'));
        $role->slug = strtolower(Input::get('slug'));
        $role->permissions()->sync($permissions);
        $role->save();

        return \Redirect::route('admin.user.roles')->withSuccess('The role has been updated.');
    }

    public function delete($roleSlug)
    {
        if ($roleSlug == 'admin')
            return \Redirect::route('admin.user.roles')->withErrors('You cannot delete the Admin role.');
        $role = Role::where('slug', $roleSlug)->first();
        $role->permissions()->detach();
        $role->delete();
        return \Redirect::route('admin.user.roles')->withSuccess('The role has been deleted.');
    }
}
