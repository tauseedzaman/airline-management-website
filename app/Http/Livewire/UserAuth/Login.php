<?php

namespace App\Http\Livewire\UserAuth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public function render()
    {
        return view('livewire.user-auth.login')->layout("layouts.app");
    }

    public function login()
    {
        $this->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);
        $user=Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        if($user){
            return redirect("/");
        }else{
            dd("invalid username and password");
        }
    }
}
