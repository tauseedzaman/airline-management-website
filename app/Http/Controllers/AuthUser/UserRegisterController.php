<?php

namespace App\Http\Controllers\AuthUser;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function create(Request $request)
    {
        $user = new User();
        $is_email = User::where("email", $request->email)->first();
        if ($is_email) {
            return response()->json(["exist" => true]);
        } else {
            $filename = "";
            if ($request->hasFile("file")) {
                $filename = $request->file("file")->store("upload/users", "public");
            } else {
                $filename = "null";
            }
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->image = $filename;
            $result = $user->save();
            if ($result) {
                return response()->json(["success"=>true]);
            }else{
                return response()->json(["success"=>false]);
            }
        }
    }
}