<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DocumentationController;

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

Route::get('/', [BookmarkController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/documentation', [DocumentationController::class, 'index']);
Route::get('/donation', [DonationController::class, 'index']);
Route::get('/contacts', [ContactsController::class, 'index']);


