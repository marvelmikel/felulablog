<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public function render()
    {
        $userId = Auth::user()->id;;
        $users = User::latest()->paginate(10);
        return view('livewire.admin.users', 
                ['posts' => $users]
            );
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash("message", "User has been deleted");
    }

    public function publish(int $id)
    {
        $user = User::find($id);
        $status = $user->is_published ? "unpublished": "published";
        $user->is_published = !$user->is_published;
        $user->published_date = now();
        $user->save();
        session()->flash("message", "User $status successfully");
    }
}
