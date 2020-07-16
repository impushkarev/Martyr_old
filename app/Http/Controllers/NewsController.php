<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);

        return view('news.news', [
            'news' => $news,
        ]);
    }

    public function create_item()
    {
        return view('auth.admin.news.edit', [
            'form' => 'save',
        ]);
    }

    public function save_item(Request $request)
    {
        $news = new News;
        $this->construct_news($request, $news);

        return redirect()->route('admin');
    }

    public function edit_item(News $news)
    {
        return view('auth.admin.news.edit', [
            'news' => $news,
            'form' => 'update',
        ]);
    }

    public function update_item(Request $request, News $news)
    {
        $this->construct_news($request, $news);

        return redirect()->route('admin');
    }

    public function delete_item()
    {

    }
    
    private function construct_news($request, $news)
    {
        $news->fill([
            'preview_photo' => $request->photo_names,
            'title' => $request->title,
            'text' => $request->news,
        ])->push();

        if ($request->hasFile('photo'))
            $request->file('photo')->move(public_path() . '\img\news\\' . $request->title, $request->file('photo')->getClientOriginalName());
    }
}