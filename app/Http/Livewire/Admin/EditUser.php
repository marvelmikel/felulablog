<?php //tall-blog/app/Http/Livewire/Dashboard/EditPost.php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $isEdit = true;

    protected $rules = [
        'user.name' => 'sometimes|string',
        'user.email' => 'sometimes|email',
    ];

    protected $messages = [
        'required' => 'This field is required',
        'unique' => 'The email  is already taken',
        'min' => 'Value must be more than :min chars',
        'max' => 'Maximum value is 250 chars'
    ];

    public function render()
    {
        return view('livewire.admin.create-user');
    }

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function save()
    {
        $this->validate();
        $this->user->save();
        session()->flash("message", "User updated successfully");
        return redirect()->route('admin.users');
    }

    
}
