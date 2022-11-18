<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'bookmarks' => Bookmark::all()
        ]);
    }
    public function download(Bookmark $bookmark)
    {
        $file = public_path('/files/').$bookmark->slug.".html";
        $header = array(
            "Content-Type: application/html"
        );
        return response()->download($file, $bookmark->slug.".html", $header);
    }
    public function getAll()
    {
        return view('dashboard.bookmarks', [
            'title' => 'Bookmarks',
            'bookmarks' => Bookmark::all()
        ]);
    }
    public function show(Bookmark $bookmark)
    {
        return view('dashboard.bookmark', [
            'title' => 'Bookmark',
            'bookmark' => $bookmark
        ]);
    }
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Create Bookmark'
        ]);
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Bookmark::class, 'slug', $request->name);
        return response()->json([ 'slug' => $slug ]);
    }
    public function store(Request $request)
    {
        $bookmark = [
            'name' => $request->name,
            'slug' => $request->slug,
            'version' => $request->version,
            'file' => $request->slug.".html",
            'summary' => $request->summary,
            'description' => $request->description
        ];
        $category = [
            'name' => $request->category
        ];
        $categoryFilter = Category::where("name", $category)->get();
        $bookmark["category_id"] = 1;
        Category::create($category);
        Bookmark::create($bookmark);
        return redirect('/dashboard/bookmarks');
    }
    public function update(Bookmark $bookmark)
    {
        return view('dashboard.update', [
            'title' => 'Update Bookmark',
            'bookmark' => $bookmark
        ]);
    }
    public function storeUpdate(Request $request, Bookmark $bookmark)
    {
        $newBookmark = [
            'name' => $request->name,
            'slug' => $request->slug,
            'version' => $request->version,
            'category_id' => $bookmark->category->id,
            'file' => $request->slug.".html",
            'summary' => $request->summary,
            'description' => $request->description 
        ];
        $category = [
            'name' => $request->category
        ];
        Bookmark::where('id', $bookmark->id)
                    ->update($newBookmark);
        return redirect('/dashboard/bookmarks');
    }
    public function delete(Bookmark $bookmark)
    {
        Bookmark::destroy($bookmark->id);
        return redirect('/dashboard/bookmarks');
    }
}
