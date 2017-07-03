<?php

namespace App\Http\Controllers;

use App\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function news()
    {
        return view('news');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function doLogout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function downloadClient()
    {
        Download::create(['user_id' => Auth::id()]);
        return redirect()->away('https://www.dropbox.com/s/38mm00cpuxuwt6u/Official%20Heroes-Awaken%20Game-Client.rar?dl=1');
    }
}