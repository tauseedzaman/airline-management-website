<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{

    public function total_record()
    {
        $admins = Admin::get();
        return response()->json(count($admins));
    }
    public function get()
    {
        $admins = Admin::orderBy('id', 'DESC')->get();
        return response()->json($admins);
    }

    public function create(Request $request)
    {
        $admins = new Admin();

        $is_email = Admin::where("email", $request->email)->first();
        if ($is_email) {
            return response()->json(["exist" => true]);
        } else {
            $filename = "";
            if ($request->hasFile("file")) {
                $filename = $request->file('file')->store("upload/admins", "public");
            } else {
                $filename = null;
            }
            $admins->fname = $request->fname;
            $admins->lname = $request->lname;
            $admins->username = $request->username;
            $admins->email = $request->email;
            $admins->phone = $request->phone;
            $admins->roll = $request->roll;
            $admins->image = $filename;
            $admins->password = Hash::make($request->password);
            $result = $admins->save();
            if($result){
                return response()->json(["success"=>true]);
            }else{
                return response()->json(["success"=>false]);
            }
        }
    }
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        return response()->json($admins);
    }

    public function update(Request $request, $id)
    {
        $admins = Admin::findOrFail($id);

        $destination = public_path('storage\\' . $admins->image);
        
        $filename = "";
        if ($request->hasFile("new_file")) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $request->file('new_file')->store("upload/admins", "public");
        } else {
            $filename = null;
        }
        $admins->fname = $request->fname;
        $admins->lname = $request->lname;
        $admins->username = $request->username;
        $admins->email = $request->email;
        $admins->phone = $request->phone;
        $admins->roll = $request->roll;
        $admins->image = $filename;
        $admins->password = Hash::make($request->password);
        $result = $admins->save();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }

    public function delete($id)
    {
        $admins = Admin::findOrFail($id);
        $destination = public_path('storage\\' . $admins->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $result=$admins->delete();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }
}
