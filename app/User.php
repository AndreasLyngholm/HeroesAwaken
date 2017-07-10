<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
        'username', 'email', 'password', 'country', 'language', 'birthday', 'description', 'ip_address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function signature()
    {
        return $this->hasOne('App\UserSignature');
    }

    /**
     * Adds the user to a group
     * @param $groupName string The name of the group to add the user
     */
    public function addToGroup($groupName)
    {
        $group = DB::table('groups')
                           ->where('name', $groupName)
                           ->first();

        if ($group)
        {
            DB::table('user_group')->insert([
                'user_id' => $this->getAuthIdentifier(),
                'group_id' => $group->id
            ]);
        }
    }

    /**
     * Check if the user is in the group
     * @param $groupName The name of the group
     * @return boolean True if the user is in the group, false otherwise
     */
    public function hasGroup($groupName)
    {
        foreach ($this->groups as $group)
        {
            if ($group->name === $groupName)
                return true;
        }
        return false;
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'user_group');
    }

}
