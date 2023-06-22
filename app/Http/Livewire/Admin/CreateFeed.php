<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feed;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateFeed extends Component
{
    public $feed;

    protected $rules = [
        'feed.name' => 'required|string',
        'feed.link' => 'url|unique:feeds,link'
    ];

    protected $messages = [
        'required' => 'This field is required',
        'unique' => 'The email  is already taken'
    ];

    public function render()
    {
        return view('livewire.admin.create-feed');
    }

    public function save()
    {
        $this->validate();
        $feed = Feed::create([
            'name' => $this->feed['name'],
            'link' => $this->feed['link'],
        ]);
        return redirect()->route('admin.feeds');
    }
}
