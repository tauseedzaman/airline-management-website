<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if($user){
            if(password_verify($request->password,$user->password)){
                $token=$user->createToken("token")->plainTextToken;
                
            return response()->json(["token"=>$token,"success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
        }
        // $user=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        // if($user){
        //     $users=Auth::user();

        //     $token=$users->createToken("token")->plainTextToken;
        //     return response()->json(["token"=>$token,"success"=>true]);
        // }else{
        //     return response()->json(["success"=>false]);
        // }
    }

    public function getUser()
    {
        $users=User::get();
        return response()->json($users);
    }
}
