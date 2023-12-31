<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $user;

    protected $rules = [
        'user.name' => 'required|string',
        'user.email' => 'email|unique:users,email',
        'user.password' => 'required|string' 
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

    public function save()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->user['name'],
            'email' => $this->user['email'],
            'password' => Hash::make($this->user['password']),
        ]);
        return redirect()->route('admin.users');
    }
}
