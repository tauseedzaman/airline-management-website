<?php

namespace App\Http\Livewire\Pages;

use App\Models\Subscribe as ModelsSubscribe;
use Livewire\Component;

class Subscribe extends Component
{

    public $email;

    public function render()
    {
        return view('livewire.pages.subscribe');
    }

    public function subscribe()
    {
        $sub=new ModelsSubscribe();
        $this->validate([
            'email'=>'required|email'
        ]);
        $is_email=ModelsSubscribe::where('email',$this->email)->first();
        if($is_email){

        }else{
            $sub->email=$this->email;
            $sub->save();
        }
    }
}
