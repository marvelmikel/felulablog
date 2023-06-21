<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublisherController;
use App\Http\Livewire\Admin\CreatePost;
use App\Http\Livewire\Admin\EditPost;
use App\Http\Livewire\Admin\FeaturedImageUpload;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post-detail');


Route::group(['prefix' => 'publisher', 'middleware' => [ 'auth:sanctum',  config('jetstream.auth_session'), 'verified'] ], function () {
    Route::get('/', [PublisherController::class, 'index'])->name('publisher.dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => [ 'auth:sanctum', 'admin',  config('jetstream.auth_session'), 'verified'] ], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('post/create', CreatePost::class )->name('admin.createpost');
    Route::get('post/edit/{id}', EditPost::class)->name('admin.edit-post');
    Route::get('post/upload/{id}',FeaturedImageUpload::class)->name('upload-featured-image');

});