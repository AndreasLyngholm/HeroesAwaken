<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'country', 'language', 'birthday', 'description', 'ip_address', 'notifications', 'avatar', 'game_token'
    ];

    protected $casts = [
        'notifications' => 'json',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function heroes()
    {
        return $this->hasMany(GameHeroes::class);
    }

    public function servers()
    {
        return $this->hasMany(GameServers::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function signature()
    {
        return $this->hasOne('App\UserSignature');
    }

    public function discordLink()
    {
        return $this->hasOne('App\UserDiscord');
    }

    public function reviveLink()
    {
        return $this->hasOne('App\UserRevive');
    }

    public function friends()
    {
        $friends = new Collection();
        foreach (UserFriend::where('user_id', $this->id)->get() as $friend)
            $friends->push(User::find($friend->friend_id));
        foreach (UserFriend::where('friend_id', $this->id)->get() as $friend)
            $friends->push(User::find($friend->user_id));
        return $friends;
    }

    public function friendRequestAnswer($sender, $answer)
    {
        FriendRequest::where('receiver', $this->id)->where('sender', $sender)->first()->update([
            'status' => $answer
        ]);
        if ($answer == "accepted") {
            $this->addFriend($sender);
        }
    }

    public function friendRequests()
    {
        return $this->hasMany('App\FriendRequest', 'receiver')->where('status', 'pending');
    }

    public function sendFriendRequest($user)
    {
        if ( ! FriendRequest::where('sender', $this->id)->where('receiver', $user)->exists())
            FriendRequest::create([
                'sender' => $this->id,
                'receiver' => $user,
            ]);
    }

    public function addFriend($user)
    {
        if ( ! UserFriend::where('user_id', $this->id)->where('friend_id', $user)->exists())
        {
            UserFriend::create([
                'user_id' => $this->id,
                'friend_id' => $user,
            ]);
            $this->friendRequestAnswer($user, 'accepted');
        }
    }

    public function removeFriend($user)
    {
        if (UserFriend::where('user_id', $this->id)->where('friend_id', $user)->exists())
            UserFriend::where('user_id', $this->id)->where('friend_id', $user)->delete();
    }

    public function isFriend($user)
    {
        if (UserFriend::where('user_id', $this->id)->where('friend_id', $user)->exists())
            return true;
        elseif (UserFriend::where('friend_id', $this->id)->where('user_id', $user)->exists())
            return true;
        else
            return false;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    #region Permissions and Roles
    public function canDo($perm = null)
    {
        if ($this->roles->count() == 0)
            return false;
        if ($perm)
            return $this->checkPermission($this->getArray($perm));
        return false;
    }

    public function getArray($perm)
    {
        return is_array($perm) ? $perm : explode('|', $perm);
    }

    public function checkPermission(Array $permissionArray = [])
    {
        foreach($this->roles as $role)
            $permissions[] = $role->permissions->pluck('slug')->toArray();
        $perms = array_unique(array_flatten($permissions));
        $perms = array_map('strtolower', $perms);
        return count(array_intersect($perms, $permissionArray)) == count($permissionArray);
    }

    public function hasPermission($perm = null)
    {
        return $this->canDo($perm);
    }

    public function hasRole($role = null)
    {
        if(is_null($role))
            return false;
        return strtolower($this->role->role_slug) == strtolower($role);
    }

    public function have($role)
    {
        return $this->role->role_slug == $role;
    }

    public function hasRoute($routeName)
    {
        $route = app('router')->getRoutes()->getByName($routeName);
        if($route)
        {
            $action = $route->getAction();
            if(isset($action['permission']))
            {
                $array = explode('|', $action['permission']);
                return $this->checkPermission($array);
            }
        }
        return false;
    }

    protected function hasAnyLike($perm)
    {
        $parts = explode('.', $perm);
        $requiredPerm = array_pop($parts);
        $perms = $this->role->permissions->fetch('permission_slug');
        foreach($perms as $perm)
        {
            if (ends_with($perm, $requiredPerm))
                return true;
        }
        return false;
    }

    public function isRole($role)
    {
        $roles = $this->roles()->pluck('slug')->all();
        return in_array($role, $roles);
    }
    #endregion

    #region Notifications
    public function notificationAdd($data)
    {
        if ($this->notifications == null)
            $this->notifications = [];

        $update = array_merge(
            $this->notifications,
            $data
        );

        $this->update(['notifications' => $update]);

        return $this->notifications;
    }

    public function notificationRemove($data)
    {
        $update = $this->notifications;
        unset($update[$data]);
        $this->update(['notifications' => $update]);

        return $this->notifications;
    }
    #endregion

}
