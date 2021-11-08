<?php

namespace App\Http\Livewire\UserAuth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Signup extends Component
{
    public $fname;
    public $lname;
    public $email;
    public $username;
    public $phone;
    public $address;
    public $password;
    public $file;

    use WithFileUploads;
    public function store()
    {
        $user = new User();

        $this->validate([
            "fname" => "required",
            "lname" => "required",
            "username" => "required",
            "email" => "required|email",
            "phone" => "required",
            "address" => "required",
            "password" => "required",
        ]);

        $is_email = User::where("email", $this->email)->first();
        if ($is_email) {
            dd("Email allready exist");
        } else {
            $filename = "";
            if ($this->file != "") {
                $filename = $this->file->store("upload/users", "public");
            }
            $user->fname = $this->fname;
            $user->lname = $this->lname;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->address = $this->address;
            $user->phone = $this->phone;
            $user->image = $filename;
            $user->password = Hash::make($this->password);
            $result = $user->save();
            return redirect()->route("login");

        }
    }
    public function render()
    {
        return view('livewire.user-auth.signup')->layout("layouts.app");
    }
}
