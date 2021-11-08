<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get()
	{
		$category=Categorie::orderBy('id','DESC')->get();
		return response()->json($category);
	}
    public function create(Request $request)	
    {
    	$category=new Categorie();
    	$category->category_name=$request->category_name;
    	$category->posts=0;
    	$result=$category->save();
    	if($result){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}
    }

    public function edit($id)
    {
    	$category=Categorie::findOrFail($id);
    	return response()->json($category);
    }

    public function update(Request $request , $id)
    {
    	$category=Categorie::findOrFail($id);

    	$category->category_name=$request->category_name;
    	$result=$category->save();
    	if($result){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}
    }

    public function delete($id)
    {
    	$category=Categorie::findOrFail($id);
    	$result=$category->delete();
    	if($result){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}
    }
}
