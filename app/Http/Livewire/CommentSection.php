<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class CommentSection extends Component
{
    public $post;

    public $name;
    public $email;
    public $comment;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'comment' => 'required',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function addComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
        ]);

        $this->resetForm();
        $this->emit('commentAdded');
    }

    public function refreshComments()
    {
        // This method is called by Livewire's polling feature to refresh the comments section
        $this->comments = $this->post->comments()->latest()->get();
    }


    public function render()
    {
        $comments = $this->post->comments;

        return view('livewire.comment-section', compact('comments'));
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->comment = '';
    }
}