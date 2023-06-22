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
                ['users' => $users]
            );
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash("message", "User has been deleted");
    }

   
}
