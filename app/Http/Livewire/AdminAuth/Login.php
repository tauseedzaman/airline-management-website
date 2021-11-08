<?php

namespace App\Http\Livewire\AdminAuth;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.admin-auth.login')->layout('layouts.admin-login');
    }

    public function login()
    {
        $this->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $admin=Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password]);

        if(Auth::guard('admin')->user()->roll == 1){
            return redirect(route('admin.dashboard'));
        }else{
            return redirect(route('normal.post'));
        }


    }
}
