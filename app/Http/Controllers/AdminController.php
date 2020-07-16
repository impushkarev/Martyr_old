<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\ItemTags;
use App\ItemImages;
use App\ItemFilters;
use App\News;

class AdminController extends Controller
{
    public function index()
    {
        $items = Items::orderBy('id', 'desc')->paginate(5);
        $news = News::orderBy('id', 'desc')->paginate(5);

        return view('auth.admin.admin', [
            'items' => $items,
            'news' => $news,
        ]);
    }

    public function create_item()
    {
        $filters = ItemFilters::all()->pluck('filter')->diff(['man', 'woman']);
        $tags = ItemTags::all()->pluck('tag');

        return view('auth.admin.item.edit', [
            'filters' => $filters,
            'tags' => $tags,
            'form' => 'save',
        ]);
    }

    public function save_item(Request $request)
    {
        $this->validate($request, [
            'title' => 'unique:items',
        ]);
        $item = new Items;
        $this->construct_item($request, $item);

        return redirect()->route('admin');
    }

    public function edit_item(Items $item)
    {
        $filters = ItemFilters::all()->pluck('filter')->diff(['man', 'woman']);
        $tags = ItemTags::all()->pluck('tag');

        return view('auth.admin.item.edit', [
            'item' => $item,
            'filters' => $filters,
            'tags' => $tags,
            'form' => 'update',
        ]);
    }

    public function update_item(Request $request, Items $item)
    {
        $item->images()->delete();
        $item->filters()->detach();
        $item->tags()->detach();

        $this->construct_item($request, $item);

        return redirect()->route('admin');
    }

    public function delete_item(Items $item)
    {
        $item->images()->delete();
        $item->filters()->detach();
        $item->tags()->detach();

        $item->delete();

        return redirect()->route('admin');
    }

    private function construct_item($request, $item) 
    {
        $request->list_filters = collect($request->list_filters)->push($request->cat);

        $this->validate($request, [
            'photo_names' => 'required',
            'title' => 'required|max:255',
            'desc' => 'required',
            'price' => 'required|integer',
            'cat' => 'required',
            'list_filters' => 'required',
            'list_tags' => 'required',
        ]);

        $item->fill([
            'title' => $request->title,
            'preview_photo' => explode('|', $request->photo_names)[0],
            'description' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
        ])->push();

        foreach ($request->list_filters as $filter) {
            $filter = ItemFilters::firstOrCreate(['filter' => $filter]);
            if ($item->filters->find($filter) === null)
                $item->filters()->attach($filter);
        }

        foreach ($request->list_tags as $tag) {
            $tag = ItemTags::firstOrCreate(['tag' => $tag]);
            if ($item->tags->find($tag) === null)
                $item->tags()->attach($tag);
        }

        foreach (explode('|', $request->photo_names) as $id => $photo) {
            if ($id == 0) continue;
            $image = new ItemImages(['photo' => $photo]);
            $item->images()->save($image);
        }
        if ($request->hasFile('photo'))
            foreach ($request->file('photo') as $id => $photo) {
                $photo->move(public_path() . '\img\shop\items\\' . $request->title, $photo->getClientOriginalName());
            }
    }
}
