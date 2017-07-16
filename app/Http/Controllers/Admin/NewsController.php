<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function lists()
    {
    	return view('admin.news.lists');
    }

    public function create()
    {
    	return view('admin.news.create');
    }

    public function doCreate()
    {
    	News::create([
            'title' => Input::get('title'),
            'text' => Input::get('text'),
            'date' => Carbon::now(),
            'user_id' => Auth::id(),
        ]);

		return redirect()->back()->with('success', 'Your news post was submitted');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function doEdit(News $news)
    {
        $news->update([
            'title' => Input::get('title'),
            'text' => Input::get('text'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Your news post was successfully updated!');
    }

    public function delete(News $news)
    {
        $news->delete();
        return redirect()->back()->with('success', 'Your news post was successfully deleted!');
    }
}
