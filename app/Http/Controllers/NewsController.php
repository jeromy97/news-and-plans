<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function list()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('news/list', ['news' => $news]);
    }

    public function add()
    {
        return view('news/add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        News::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'special' => strval(intval(boolval($request->input('special'))))
        ]);

        return redirect("news")->with('msg', 'News item saved successfully');
    }

    public function detail(News $news)
    {
        return view('news.detail', ['news' => $news]);
    }

    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required',
            'text' => 'required'
        ]);

        $news = News::find($request->input('id'));
        if ($news === null) {
            return redirect('/')->with('msg', 'This news item does not exist');
        }

        $news->title = $request->input('title');
        $news->text = $request->input('text');
        $news->special = strval(intval(boolval($request->input('special'))));
        $news->save();

        return redirect('news')->with('msg', 'News item saved successfully');
    }
}
