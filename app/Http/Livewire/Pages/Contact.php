<?php

namespace App\Http\Livewire\Pages;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $fname;
    public $lname;
    public $email;
    public $website;
    public $message;
    public function render()
    {
        return view('livewire.pages.contact')->layout("layouts.app");
    }

    public function contactUs()
    {
        
        $this->validate([
            "fname" => "required",
            "lname" => "required",
            "email" => "required|email",
            "message" => "required",
        ]);
        $contact=new ModelsContact();
        $contact->fname = $this->fname;
        $contact->lname = $this->lname;
        $contact->email = $this->email;
        $contact->website = $this->website;
        $contact->message = $this->message;
        $result = $contact->save();
    }
}
