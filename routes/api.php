<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->resource('posts', PostController::class);

Route::middleware('auth:sanctum')->prefix('/user')->group(function(){
    Route::get('me', [LoginController::class, 'me']);
    Route::get('posts', [PostController::class, 'myPosts']);
});
