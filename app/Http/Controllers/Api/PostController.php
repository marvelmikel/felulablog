<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreatePost;
use App\Http\Requests\UpdatePost;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return 
     */
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return response([
            'status' => 'success',
            'message' => 'All posts retrieved successfully',
            'data' => $posts 
        ], 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return 
     */
    public function show(Post $post)
    {
        $post = request()->user()->posts()->find($post->id);
        return response([
            'status' => 'success',
            'message' => 'User post retrieved successfully',
            'data' => $post 
        ], 200);
    }


    /**
     *  Store resource.
     *
     * @return 
     */
    public function store(CreatePost $request)
    {

        $payload = $request->validated();
        $post = request()->user()->posts()->create( $payload );

        if(request()->hasFile('featured_image') ){
            $file = request()->file('featured_image');
            $current = Carbon::now()->format('YmdHs');
            $fileExtension =  $file->getClientOriginalExtension();
            $nnn =str_replace( $fileExtension, '-'.$current . '.' .$fileExtension,  Str::slug($file->getClientOriginalName()) );
            $fileName = strtoupper($nnn);

            Storage::putFileAs('public/images', $file, $fileName );
            $post->featured_image = $fileName;
            $post->save();

        }
        

        return response([
            'status' => 'success',
            'message' => 'User post created successfully',
            'data' => $post 
        ], 200);
    }

    /**
     *  Store resource.
     *
     * @return 
     */
    public function update(UpdatePost $request, $id)
    {

        $payload = $request->all();
       
        if( !$post = request()->user()->posts()->find($id) ){
            return response([
                'status' => 'error',
                'message' => 'User post not found'
            ], 400);
        }

        $post->update( $payload );

        if(request()->hasFile('featured_image') ){
            
            $file = request()->file('featured_image');
            $current = Carbon::now()->format('YmdHs');
            $fileExtension =  $file->getClientOriginalExtension();
            $nnn =str_replace( $fileExtension, '-'.$current . '.' .$fileExtension,  Str::slug($file->getClientOriginalName()) );
            $fileName = strtoupper($nnn);

            Storage::putFileAs('public/images', $file, $fileName );
            $post->featured_image = $fileName;
            $post->save();

        }
        
        return response([
            'status' => 'success',
            'message' => 'User post updated successfully',
            'data' => $post 
        ], 200);
    }


        /**
     *  Store resource.
     *
     * @return 
     */
    public function destroy(UpdatePost $request,  $id)
    {

        if( !$post = request()->user()->posts()->find($id) ){
            return response([
                'status' => 'error',
                'message' => 'User post not found'
            ], 400);
        }
        
        $post->delete();
        
        return response([
            'status' => 'success',
            'message' => 'User post updated successfully',
            'data' => $post 
        ], 204);
    }


     /**
     * Display a listing of the resource.
     *
     * @return 
     */
    public function myPosts()
    {
        $posts = request()->user()->posts()->paginate(15);
        return response([
            'status' => 'success',
            'message' => 'User posts retrieved successfully',
            'data' => $posts 
        ], 200);
    }


}
