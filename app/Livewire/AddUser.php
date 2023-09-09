<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddUser extends Component
{
    use WithFileUploads;

    public $fullname;
    public $email;
    public $contact_number;
    public $address;
    public $role;
    public $password;
    public $password_confirmation;
    public $photo; // Property for storing the selected file
    // public $photoPreview; // Property for storing the preview URL


    public function store()
    {
        $this->validate([
            'role' => 'required',
            'fullname' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'contact_number' => 'required|digits:11',
            'address' => 'required|',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'role_id' => $this->role,
            'name' =>  $this->fullname,
            'email' =>  $this->email,
            'contact_number' =>  $this->contact_number,
            'address' =>  $this->address,
            'password' =>  bcrypt($this->password)
        ]);

        session()->flash('success', 'User added successfully');

        return redirect(route('admin.users'));
    }


    public function render()
    {
        return view('livewire.add-user');
    }
}
