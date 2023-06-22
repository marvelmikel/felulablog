<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public $user;
    public $categories;

    protected $rules = [
        'user.title' => 'required|string',
        'user.category' => 'required',
        'user.body' => 'required|string',
        'user.excerpt' => 'required',
        'user.is_published' => 'boolean'
    ];

    protected $messages = [
        'required' => 'This field is required',
        'min' => 'Value must be more than :min chars',
        'max' => 'Maximum value is 250 chars'
    ];

    public function render()
    {
        return view('livewire.admin.create-user');
    }

    public function mount()
    {
        $this->categories =  \App\Models\Category::all();
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'title' => $this->user['title'],
            'excerpt' => $this->user['excerpt'],
            'category' => $this->user['category'],
            'body' => $this->user['body'],
            'published_date' => now(),
            'user_id' => Auth()->user()->id,
            'is_published' => $this->user['is_published']
        ]);

        $id = $user->save();
        return redirect()->back();
    }
}
