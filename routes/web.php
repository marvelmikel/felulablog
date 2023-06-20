<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post}', [PostController::class, 'show'])->name('post-detail');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::group(['prefix' => 'dashboard', 'middleware' => [ 'auth:sanctum',  config('jetstream.auth_session'),
'verified'] ], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('post/add', NewPost::class)->name('new-post');

    // Route::get('post/upload/{id}', 
        // FeaturedImageUpload::class
    // )->name('upload-featured-image');

    Route::get('post/edit/{id}', function ($id) {
        return view('dashboard');
    })->name('edit-post');
});