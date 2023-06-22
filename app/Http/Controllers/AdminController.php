<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::paginate(15);
        return view('admin.dashboard', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function getUsers()
    {
        $posts = Post::paginate(15);
        return view('admin.users', compact('posts'));
    }


}
