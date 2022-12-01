<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

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
    public function getAll(User $user)
    {
        return view('dashboard.bookmarks', [
            'title' => 'My Bookmarks',
            'bookmarks' => Bookmark::with('category')
                        ->latest()
                        ->where('user_id', $user->id)
                        ->get()

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
            'slug' => 'required|max:255|min:3|unique:bookmarks',
            'version' => 'required|min:5',
            'file' => 'file|max:1024',
            'summary' => 'required|min:10|max:255',
            'description' => 'required'
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
        return redirect('/dashboard/bookmarks')->with('success', 'Bookmark has creaated!');
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
        $rules = [
            'name' => 'required|max:255|min:3',
            'version' => 'required|min:5',
            'file' => 'file|max:1024',
            'summary' => 'required|min:10|max:255',
            'description' => 'required'
        ];
        $validateCategory = [
            'name' => $request->category,
            'slug' => $request->category
        ];
        $categoryFilter = Category::where("name", $validateCategory)->get();
        $validateData["category_id"] = 1;
        if(!$bookmark->slug) {
            $rules['slug'] = 'required|max:255|min:3|unique:bookmarks';
        }
        $validateBookmark = $request->validate($rules);
        if($request->file('file')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateBookmark["file"] = $request->file('file')->store('bookmark-file');
        }
        Category::where('id', $bookmark->category_id)
                    ->update($validateCategory);
        Bookmark::where('id', $bookmark->id)
                    ->update($validateBookmark);
        return redirect('/dashboard/bookmarks')->with('update', 'Bookmark has updated!');
    }
    public function delete(Bookmark $bookmark)
    {
        if($bookmark->file) {
            Storage::delete($bookmark->file);
        }
        Bookmark::destroy($bookmark->id);
        return redirect('/dashboard/bookmarks')->with('delete', 'Bookmark has deleted!');
    }
}
