<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function create()
    {
    	return view('admin.news.create');
    }

    public function doCreate()
    {
    	\App\News::create([
			'title' => Input::get('title'),
			'text' => Input::get('text'),
			'date' => Carbon::now(),
			'user_id' => Auth::id(),
		]);

		return redirect()->back()->with('success', 'Your news post was submitted');
    }
}
