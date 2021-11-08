<?php

namespace App\Http\Livewire\Pages;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{

    use WithPagination;
    public function render()
    {
        $posts=ModelsBlog::orderBy('id','DESC')->paginate(10);
        return view('livewire.pages.blog',['posts'=>$posts])->layout("layouts.app");
    }

    public function incrementView($id)
    {
        $blog=ModelsBlog::find($id);
        $views=$blog->views + 1;
        $blog->views=$views;
        $blog->save();
    }
}
