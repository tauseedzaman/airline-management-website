<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getRandomPost()
    {
        $posts=Blog::with('category','admins')->inRandomOrder()->first();
        return response()->json($posts);
    }

    public function getAllPost()
    {
        $posts=Blog::with('category','admins')->orderBy('id','DESC')->get();
        return response()->json($posts);
    }

    public function getDetail($id)
    {
        $posts=Blog::findOrFail($id);
        return response()->json($posts);
    }
}
