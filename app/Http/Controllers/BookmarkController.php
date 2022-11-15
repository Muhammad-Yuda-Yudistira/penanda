<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
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
        return view('bookmarks', [
            'title' => 'Bookmarks',
            'bookmarks' => Bookmark::all()
        ]);
    }
    public function show(Bookmark $bookmark)
    {
        return view('bookmark', [
            'title' => 'Bookmark',
            'bookmark' => $bookmark
        ]);
    }
    public function create()
    {
        return view('create', [
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
        // $bookmark = [
        //     'name' => $request->name,
        //     'slug' => $request->slug,
        //     'version' => $request->version,
        //     'file' => $request->file,
        //     'summary' => $request->summary,
        //     'description' => $request->description
        // ];
        // $category = [
        //     'name' => $request->category
        // ];
        return $request;
        // Bookmark::create($request);
        // return redirect('/bookmarks');
    }
}
