<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();

            switch ($user->role_id) {
                case 1:
                    // dd('Redirecting to admin');
                    return redirect()->route('admin.index');
                    break;
                case 2:
                    // dd('Redirecting to staff');
                    return redirect()->route('staff.index');
                    break;
                case 3:
                    // dd('Redirecting to staff');
                    return redirect()->route('trainer.index');
                    break;
                case 4:
                    // dd('Redirecting to staff');
                    return redirect()->route('member.index');
                    break;
                default:
                    dd('Redirecting to login');
                    return redirect(route('login'));
            }
        } else {
            dd("Authentication failed");
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
