<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserPosts extends Component
{
    use WithPagination;

    public function render()
    {
        $userId = Auth::user()->id;
        $posts = Post::where('user_id', $userId)->paginate(10);
        return view('livewire.user-posts', 
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
}
