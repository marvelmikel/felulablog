<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feed;
use Livewire\Component;
use Livewire\WithPagination;

class Feeds extends Component
{
    use WithPagination;

    public function render()
    {
        $feeds = Feed::latest()->paginate(10);
        return view('livewire.admin.feeds', 
                ['feeds' => $feeds]
            );
    }

    public function delete(int $id)
    {
        $user = Feed::find($id);
        $user->delete();
        session()->flash("message", "User has been deleted");
    }

    
}
