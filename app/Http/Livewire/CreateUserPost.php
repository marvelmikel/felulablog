<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreateUserPost extends Component
{
    public $post;
    public $categories;

    public $body;

    protected $rules = [
        'post.title' => 'required|string',
        'post.category_id' => 'required',
        'post.excerpt' => 'required',
    ];

    protected $messages = [
        'required' => 'This field is required',
        'min' => 'Value must be more than :min chars',
        'max' => 'Maximum value is 250 chars'
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function mount($value = '')
    {
        $this->categories =  \App\Models\Category::all();
        $this->body = $value;
    }

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'title' => $this->post['title'],
            'excerpt' => $this->post['excerpt'],
            'category_id' => $this->post['category_id'],
            'body' => $this->body,
            'published_date' => now(),
            'is_published' => true,
            'user_id' => Auth()->user()->id
        ]);

        $id = $post->save();
        return redirect()->route('user.upload-featured-image', ['id' => $post->id]);
    }
}
