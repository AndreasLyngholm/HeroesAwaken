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
}
