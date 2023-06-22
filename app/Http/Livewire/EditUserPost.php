<?php //tall-blog/app/Http/Livewire/Dashboard/EditPost.php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditUserPost extends Component
{
    public $post;
    public $categories;
    public $isEdit = true;

    public $body;

    protected $rules = [
        'post.title' => 'required|string',
        'post.category_id' => 'required',
        'post.body' => 'required',
        'post.excerpt' => 'required',
        // 'post.is_published' => 'boolean',
    ];

    public function mount($id, $value = '')
    {
        $this->post = Post::find($id);
        $this->categories =  \App\Models\Category::all();
        $this->body =  $this->post->body;
        $this->post->body = $value;
    }

    

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save()
    {
        $this->validate();
        $this->post->save();
        session()->flash("message", "Post updated successful, upload feature image here");
        return redirect()->to(route('user.upload-featured-image', ['id' => $this->post->id]));
    }
}
