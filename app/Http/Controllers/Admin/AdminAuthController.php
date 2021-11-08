<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;

        $admins=Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]);

        if($admins){
            $admin=Auth::guard('admin')->user();
            $token=$admin->createToken("token")->plainTextToken;
            return response()->json($token);
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        auth()->guard("admin")->user()->tokens()->delete();
    }
}
