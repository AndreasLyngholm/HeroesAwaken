<?php

namespace App\Http\Controllers;

use App\Role;
use App\Download;
use function App\can;
use App\Jobs\NotificationQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function news()
    {
        if (Auth::check())
            Auth::user()->notificationAdd(['news' => false]);
        return view('news');
    }

    public function contact()
    {
        return view('contact');
    }

    public function team()
    {
        $leads = Role::where('slug', 'awokenlead')->first()->users;
        $staffs = Role::where('slug', 'staff')->first()->users;
        $devs = Role::where('slug', 'awokendev')->first()->users;
        return view('team', compact('staffs', 'leads', 'devs'));
    }

    public function doLogout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function downloadClient()
    {
        Download::create(['user_id' => Auth::id()]);
        return redirect()->away('https://dl.heroesawaken.com/HeroesAwakenTutorial.zip');
    }
}