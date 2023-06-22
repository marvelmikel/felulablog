<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreateUserPost extends Component
{
    public $post;
    public $categories;

    protected $rules = [
        'post.title' => 'required|string',
        'post.category_id' => 'required',
        'post.body' => 'required|string',
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

    public function mount(){
        $this->categories =  \App\Models\Category::all();
    }

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'title' => $this->post['title'],
            'excerpt' => $this->post['excerpt'],
            'category_id' => $this->post['category_id'],
            'body' => $this->post['body'],
            // 'published_date' => now(),
            'user_id' => Auth()->user()->id
        ]);

        $id = $post->save();
        return redirect()->route('user.upload-featured-image', ['id' => $post->id]);
    }
}
