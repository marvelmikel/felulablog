<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\CreatePost;
use App\Http\Livewire\Admin\CreateUser;
use App\Http\Livewire\Admin\EditPost;
use App\Http\Livewire\Admin\EditUser;
use App\Http\Livewire\FeaturedImageUpload;
use App\Http\Livewire\CreateUserPost;
use App\Http\Livewire\EditUserPost;
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


Route::group(['prefix' => 'user', 'middleware' => [ 'auth:sanctum',  config('jetstream.auth_session'), 'verified'] ], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('post/create', CreateUserPost::class )->name('user.createpost');
    Route::get('post/edit/{id}', EditUserPost::class)->name('user.edit-post');
    Route::get('post/upload/{id}',FeaturedImageUpload::class)->name('user.upload-featured-image');
    
});

Route::group(['prefix' => 'admin', 'middleware' => [ 'auth:sanctum', 'admin',  config('jetstream.auth_session'), 'verified'] ], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('post/create', CreatePost::class )->name('admin.createpost');
    Route::get('post/edit/{id}', EditPost::class)->name('admin.edit-post');
    Route::get('post/upload/{id}',FeaturedImageUpload::class)->name('admin.upload-featured-image');


    Route::get('users', [AdminController::class, 'getUsers'])->name('admin.users');
    Route::get('users/create', CreateUser::class )->name('admin.createuser');
    Route::get('users/edit/{id}', EditUser::class)->name('admin.edit-user');


});