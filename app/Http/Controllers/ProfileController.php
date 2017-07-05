<?php

namespace App\Http\Controllers;

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
}
