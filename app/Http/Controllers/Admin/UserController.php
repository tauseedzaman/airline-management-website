<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function total_record()
    {
        $users = User::get();
        return response()->json(count($users));
    }
    public function get()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return response()->json($users);
    }

    public function delete($id)
    {
        $users=User::findOrFail($id);
        $destination=public_path("storage\\".$users->image);

        if(File::exists($destination)){
            File::delete($destination);
        }

        $result=$users->delete();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }
}
