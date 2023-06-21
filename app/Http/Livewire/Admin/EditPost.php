<?php //tall-blog/app/Http/Livewire/Dashboard/EditPost.php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $post;
    public $isEdit = true;

    protected $rules = [
        'post.title' => 'required|string',
        'post.category' => 'required',
        // 'post.body' => 'required|string|min:500',
        'post.body' => 'required',
        // 'post.excerpt' => 'required|min:100|max:250',
        'post.excerpt' => 'required',
        'post.is_published' => 'boolean',
    ];

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.admin.create-post');
    }

    public function save()
    {
        $this->validate();
        $this->post->save();
        session()->flash("message", "Post update successful");
    }
}
