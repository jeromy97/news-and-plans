<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $user = Auth::user();
        $news = $user->news()->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('news/list', compact('news'));
    }

    public function detail(News $news)
    {
        return view('news.detail', compact('news'));
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

        /** @var User $user */
        $user = Auth::user();

        // upload file
        if ($request->file('file') !== null) {
            $path = $request->file('file')->store('news');
    
            // store path
            $file = new File;
            $file->path = $path;
            $file->save();
            $fileId = $file->id;
        }
        
        $userData = [
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'special' => strval(intval(boolval($request->input('special'))))
        ];
        if (isset($fileId)) $userData['file_id'] = $fileId;

        $user->news()->create($userData);

        return redirect("news")->with('msg', 'News item saved successfully');
    }

    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|min:5|max:500',
            'text' => 'required|min:10'
        ]);

        $news->title = $request->input('title');
        $news->text = $request->input('text');
        $news->special = strval(intval(boolval($request->input('special'))));
        $news->save();

        return redirect('news')->with('msg', 'News item saved successfully');
    }
}
