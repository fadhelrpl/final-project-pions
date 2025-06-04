<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $title = 'News';

        $news = News::with('user')
            ->latest('published_at')
            ->get();

        return view('news', compact('news', 'title'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->with('user')->firstOrFail();
        $title = $news->title;

        return view('news_details', compact('news', 'title'));
    }
}
