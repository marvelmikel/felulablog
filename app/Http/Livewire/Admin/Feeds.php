<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Feed;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Vedmant\FeedReader\Facades\FeedReader;

class Feeds extends Component
{
    use WithPagination;

    public function render()
    {
        $feeds = Feed::latest()->paginate(10);
        return view('livewire.admin.feeds', ['feeds' => $feeds]);
    }

    public function delete(int $id)
    {
        $user = Feed::find($id);
        $user->delete();
        session()->flash("message", "Feed has been deleted");
    }

  
}
