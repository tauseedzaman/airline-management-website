<?php

namespace App\Http\Livewire\UserAuth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.user-auth.logout')->layout("layouts.app");
    }


    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
