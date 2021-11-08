<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user= new User();

        $is_email=User::where('email',$request->email)->first();
        if($is_email){
            return response()->json(['exsits'=>true]);
        }else{
            $filename="";
            if($request->hasFile("file")){
                $file=$request->file('file');
                $filename=rand()."-".$file->getClientOriginalName();
                // $file->move("public/storage/upload/users",$file);
                $file->store('upload/users','public');
                
            }else{
                $filename="NULL";
            }
            $user->fname=$request->fname;
            $user->lname=$request->lname;
            $user->username=$request->username;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password=Hash::make($request->password);
            $user->image=$filename;
            $result=$user->save();
            if($result){
                return response()->json(['success'=>true]);
            }else{
                return response()->json(['success'=>false]);
            }

        }

    }

    public function login(Request $request)
    {
        $user=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($user){
            $users=Auth::user();
            return response()->json(['success'=>true,'user'=>$users]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    // public function get()
    // {
    //     return response()->json($user);
    // }

    public function logout()
    {
        Auth::logout();
    }
}
