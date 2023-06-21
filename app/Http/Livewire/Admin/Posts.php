<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public function render()
    {
        $userId = Auth::user()->id;;
        $posts = Post::latest()->paginate(10);
        return view('livewire.admin.posts', 
                ['posts' => $posts]
            );
    }

    public function delete(int $id)
    {
        $post = Post::find($id);
        if($post->featured_image) unlink(storage_path("app/public/images/".$post->featured_image)) ;

        // Storage::disk($storageDisk)->delete($media->path);
        $post->delete();
        session()->flash("message", "Post has been deleted");
    }

    public function publish(int $id)
    {
        $post = Post::find($id);
        $status = $post->is_published ? "unpublished": "published";
        $post->is_published = !$post->is_published;
        $post->published_date = now();
        $post->save();
        session()->flash("message", "Post $status successfully");
    }
}
