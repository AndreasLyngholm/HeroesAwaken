<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function friends()
    {
        $friends = new Collection();
        foreach (UserFriend::where('user_id', $this->id)->get() as $friend)
            $friends->push(User::find($friend->friend_id));
        return $friends;
    }

    public function friendRequestAnswer($sender, $answer)
    {
        FriendRequest::where('receiver', $this->id)->where('sender', $sender)->first()->update([
            'status' => $answer
        ]);
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

    }
}