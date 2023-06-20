<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    //public $posts;

    use WithPagination;
    

    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function mount() {
    //     //$this->posts = Post::where('is_published', true)->paginate(12);
    // }
    public function render() {
        return view('livewire.post-index', ['posts' =>  Post::where('is_published', true)->where('title', 'like', '%'.$this->search.'%')->paginate(12) ]);//->layout("layouts/guest");
    }
}
