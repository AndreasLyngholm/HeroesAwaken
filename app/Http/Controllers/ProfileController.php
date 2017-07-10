<?php

namespace App\Http\Controllers;

use App\FriendRequest;
use App\User;
use App\UserSignature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    // User profiles
    // A users own profile
    public function lists()
    {
        return view('profile.lists');
    }

    public function addSignature()
    {
        if( ! Input::hasFile('image'))
            return redirect()->back()->with('error', 'You need to have a image chosen.');

        $file = Input::file('image');
        $fileName = $file->getClientOriginalName();
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = str_random(48) . ".$ext";
        $file->move(public_path() . '/images/signatures/', $newFileName);

        if(UserSignature::where('user_id', Auth::id())->exists())
            UserSignature::where('user_id', Auth::id())->first()->update([
                'image' => '/images/signatures/' . $newFileName,
            ]);
        else
            UserSignature::create([
                'user_id' => Auth::id(),
                'image' => '/images/signatures/' . $newFileName,
            ]);

        return redirect()->back()->with('success', 'Your signature got added!');
    }

    public function addDescription()
    {
        if(Input::get('description') == '')
            return redirect()->back()->with('error', 'The description cannot be empty!');
        $description = str_replace(['&lt;script&gt;'], '', Input::get('description'));
        $description = str_replace(['&lt;/script&gt;'], '', $description);

        Auth::user()->update([
            'description' => $description
        ]);

        return redirect()->back()->with('success', 'Your description got updated!');
    }

    public function details($username)
    {
        if( ! User::where('username', $username)->exists())
            abort(404);

        $user = User::where('username', $username)->first();
        return view('profile.details', compact('user'));
    }

    public function answerFriendRequest($user)
    {

    }

    public function addFriend($user)
    {
        // Check if a friend request already exists.
        // If it does, add friend.
        if (FriendRequest::where('receiver', Auth::id())->where('sender', $user)->exists())
        {
            Auth::user()->addFriend($user);
            return redirect()->back()->with('success', User::find($user)->username . ' was added to your friend list');
        }
        else
        // If not, send one.
        {
            Auth::user()->sendFriendRequest($user);
            return redirect()->back()->with('success', 'A friend request was sent!');
        }
    }
}
