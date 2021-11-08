<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    

    use WithPagination;

    public function render()
    {
        $users=User::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.users',['users'=>$users])->layout('layouts.admin-app');
    }

    public function delete($id)
    {
        $users=User::findOrFail($id);
        $destination=public_path("storage\\".$users->image);

        if(File::exists($destination)){
            File::delete($destination);
        }

        $users->delete();
    }
}
