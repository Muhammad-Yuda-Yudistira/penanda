<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

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
        $file = public_path('/files/').$bookmark->name.".html";
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
    public function createBookmark()
    {
        return view('createBookmark', [
            'title' => 'Create Bookmark'
        ]);
    }
    public function create($bookmark)
    {
        Bookmark::create($bookmark);
        return redirect('/bookmarks');
    }
}
