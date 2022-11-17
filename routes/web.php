<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// halaman home dan menu
Route::get('/', [BookmarkController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/documentation', [DocumentationController::class, 'index']);
Route::get('/donation', [DonationController::class, 'index']);
Route::get('/contacts', [ContactsController::class, 'index']);
Route::get('/download/{bookmark:slug}', [BookmarkController::class, 'download']);
// management bookmark
Route::get('/bookmarks', [BookmarkController::class, 'getAll']);
Route::get('/bookmarks/checkSlug', [BookmarkController::class, 'checkSlug']);
Route::get('/bookmarks/create', [BookmarkController::class, 'create']);
Route::get('/bookmarks/update/{bookmark:slug}', [BookmarkController::class, 'update']);
Route::get('/bookmarks/{bookmark:slug}', [BookmarkController::class, 'show']);
Route::post('/bookmarks', [BookmarkController::class, 'store']);
Route::put('/bookmarks/{bookmark:slug}', [BookmarkController::class, 'storeUpdate']);
Route::delete('/bookmarks/{bookmark:slug}', [BookmarkController::class, 'delete']);
// system user
Route::get('/register', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);