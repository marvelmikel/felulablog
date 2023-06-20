<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $news = Post::paginate(15);
        return view('index', compact('news'));
    }
}
