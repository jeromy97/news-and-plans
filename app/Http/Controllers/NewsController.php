<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('news/list', ['news' => $news]);
    }
}
