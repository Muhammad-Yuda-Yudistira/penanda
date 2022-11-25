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
            'bookmarks' => Bookmark::with('category')->latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString()
        ]);
    }
    public function download(Bookmark $bookmark)
    {
        $file = public_path('/storage/').$bookmark->file;
        $header = array(
            "Content-Type: application/html"
        );
        return response()->download($file, $bookmark->slug.'.html', $header);
    }
    public function getAll()
    {
        return view('dashboard.bookmarks', [
            'title' => 'My Bookmarks',
            'bookmarks' => Bookmark::with('category')->latest()->get()
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
       $validateData = $request->validate([
            'name' => 'required|max:255|min:3',
            'slug' => 'required|max:255|min:3',
            'version' => 'required|min:5',
            'file' => 'file|max:1024',
            'summary' => 'required|min:10|max:255',
            'description' => 'nullable'
        ]);
        $validateCategory = [
            'name' => $request->category,
            'slug' => $request->category
        ];
        $categoryFilter = Category::where("name", $validateCategory)->get();
        $validateData["category_id"] = 1;
        $validateData["file"] = $request->file('file')->store('bookmark-file');
        Category::create($validateCategory);
        Bookmark::create($validateData);
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
        $validateData = $request->validate([
            'name' => 'required|max:255|min:3',
            'slug' => 'required|max:255|min:3',
            'version' => 'required|min:5',
            'category_id' => 'required',
            'file' => 'file|max:1024',
            'summary' => 'required|min:10|max:255',
            'description' => 'nullable'
            
        ]);
        $validateData['category_id'] = $bookmark->category->id;
        $category = [
            'name' => $request->category,
            'slug' => $request->category
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
