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
        $userId = Auth::user()->id;;
        $posts = Post::where('id', $userId)->paginate(10);
        return view('livewire.user-posts', 
                ['posts' => $posts]
            );
    }
}
