<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewUser extends Component
{
    public $user;

    public $isOpen;

    public $name;
    public $email;
    public $contact_number;
    public $address;

    public function deleteUser()
    {
        if ($this->user && $this->user->exists) {
            $this->user->delete();

            session()->flash('success', 'User deleted successfully');
        } else {
            session()->flash('error', 'User not found or has not been persisted yet');
        }

        return redirect(route('admin.users'));
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'contact_number' => 'required',
            'address' => 'required'
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'address' => $this->address,
        ]);

        session()->flash('success', 'User successfully updated');

        $this->isOpen = false;
        // return redirect()->back();
    }

    public function resetForm()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->contact_number = $this->user->contact_number;
        $this->address = $this->user->address;
    }

    public function mount()
    {
        $userID = request()->route('id');
        $this->user = User::find($userID);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->contact_number = $this->user->contact_number;
        $this->address = $this->user->address;
    }

    public function render()
    {
        return view('livewire.view-user');
    }
}
