<?php //tall-blog/app/Http/Livewire/Dashboard/EditPost.php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $post;
    public $categories;
    public $isEdit = true;

    protected $rules = [
        'post.title' => 'sometimes|string',
        'post.category_id' => 'sometimes',
        'post.body' => 'sometimes',
        'post.excerpt' => 'sometimes|string',
        'post.is_published' => 'sometimes|boolean',
    ];

    public function mount($id)
    {
        $this->post = Post::find($id);
        $this->categories =  \App\Models\Category::all();
    }

    public function render()
    {
        return view('livewire.admin.create-post');
    }

    public function save()
    {
        $this->validate();
        $this->post->save();
        session()->flash("message", "Post updated successful, upload feature image here");
        return redirect()->route('admin.upload-featured-image', ['id' => $this->post->id]);
    }
}
