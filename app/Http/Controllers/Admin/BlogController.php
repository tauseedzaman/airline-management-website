<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function total_record()
    {
        $posts=Blog::get();
        return response()->json(count($posts));
    }
    public function get()
    {
        $categories=Categorie::get();
        $posts=Blog::with(['category','admins'])->get();
        return response()->json(["posts"=>$posts,'categories'=>$categories]);
    }

    public function create(Request $request)
    {
        $posts=new Blog();

        $filename="";
        if($request->hasFile('file')){
            $filename=$request->file("file")->store("upload/posts",'public');
        }else{
            $filename="null";
        }

        $posts->title=$request->title;
        $posts->cat_id=$request->cat_id;
        $posts->admin_id=1;
        $posts->views=0;
        $posts->description=$request->description;
        $posts->image=$filename;
        $posts->slug=Str::slug($request->title);
        $result=$posts->save();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }

    public function edit($id)
    {
        $posts=Blog::with('category')->findOrFail($id);
        return response()->json($posts);
    }

    public function update(Request $request,$id)
    {
        $posts=Blog::findOrFail($id);
        $filename="";
        $destination=public_path('storage\\'.$posts->image);
        if($request->hasFile('new_file')){
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename=$request->file('new_file')->store("upload/posts",'public');
        }else{
            $filename=$request->old_file;
        }
        $posts->title=$request->title;
        $posts->cat_id=$request->cat_id;
        $posts->description=$request->description;
        $posts->image=$filename;
        $posts->slug=Str::slug($request->title);
        $result=$posts->save();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }

    public function delete($id)
    {
        $posts=Blog::findOrFail($id);
        $destination=public_path("storage\\".$posts->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $result=$posts->delete();
        if($result){
            return response()->json(["success"=>true]);
        }else{
            return response()->json(["success"=>false]);
        }
    }
}
