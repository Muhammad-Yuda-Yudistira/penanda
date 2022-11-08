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
        $file = public_path('/files/').$bookmark->name_file;
        $header = array(
            "Content-Type: application/html"
        );
        return response()->download($file, $bookmark->name.".html", $header);
    }
}
