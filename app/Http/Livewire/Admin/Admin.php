<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Admin extends Component
{

    public $fname;
    public $lname;
    public $email;
    public $username;
    public $phone;
    public $roll;
    public $password;
    public $file;

    public $createData = false;
    public $showData = true;
    public $updateData = false;


    public $ids;
    public $edit_fname;
    public $edit_lname;
    public $edit_email;
    public $edit_username;
    public $edit_phone;
    public $edit_roll;
    public $new_file;
    public $old_file;

    use WithPagination;
    public function render()
    {
        $admins=ModelsAdmin::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.admin',['admins'=>$admins])->layout('layouts.admin-app');
    }

    public function showForm()
    {
        $this->createData = true;
        $this->showData = false;
    }

    use WithFileUploads;
    public function store()
    {
        $admins = new ModelsAdmin();

        $this->validate([
            "fname" => "required",
            "lname" => "required",
            "username" => "required",
            "email" => "required|email",
            "phone" => "required",
            "roll" => "required",
            "password" => "required",
        ]);

        $is_email = ModelsAdmin::where("email", $this->email)->first();
        if ($is_email) {
            dd("Email allready exist");
        } else {
            $filename = "";
            if ($this->file != "") {
                $filename = $this->file->store("upload/admins", "public");
            } else {
                $filename = null;
            }
            $admins->fname = $this->fname;
            $admins->lname = $this->lname;
            $admins->username = $this->username;
            $admins->email = $this->email;
            $admins->phone = $this->phone;
            $admins->roll = $this->roll;
            $admins->image = $filename;
            $admins->password = Hash::make($this->password);
            $result = $admins->save();

            $this->createData = false;
            $this->showData = true;
        }
    }

    public function edit($id)
    {
        $this->updateData=true;
        $this->showData=false;
        $admins = ModelsAdmin::findOrFail($id);
        $this->ids = $admins->id;
        $this->edit_fname = $admins->fname;
        $this->edit_lname = $admins->lname;
        $this->edit_email = $admins->email;
        $this->edit_username = $admins->username;
        $this->edit_roll = $admins->roll;
        $this->edit_phone = $admins->phone;
        $this->old_file = $admins->image;
    }

    public function update($id)
    {
        $admins = ModelsAdmin::findOrFail($id);

        $this->validate([
            "edit_fname" => "required",
            "edit_lname" => "required",
            "edit_username" => "required",
            "edit_email" => "required|email",
            "edit_phone" => "required",
            "edit_roll" => "required",
        ]);


        $filename = "";
        $destination = public_path("storage\\" . $admins->image);
        if ($this->new_file != "") {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_file->store("upload/admins", "public");
        } else {
            $filename = $this->old_file;
        }
        $admins->fname = $this->edit_fname;
        $admins->lname = $this->edit_lname;
        $admins->username = $this->edit_username;
        $admins->email = $this->edit_email;
        $admins->phone = $this->edit_phone;
        $admins->roll = $this->edit_roll;
        $admins->image = $filename;
        $result = $admins->save();

        $this->updateData=false;
        $this->showData=true;
    }


    public function delete($id)
    {
        $admins = ModelsAdmin::findOrFail($id);
        $destination = public_path("storage\\" . $admins->image);

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $admins->delete();
    }
}
