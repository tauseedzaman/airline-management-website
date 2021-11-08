<?php

namespace App\Http\Livewire\Pages;

use App\Models\Blog;
use App\Models\BookFlight;
use App\Models\Flight;
use App\Models\FlightCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    public $pages=6;
    public $sliderPost;
    public $flightCategory;
    public $flights;
    use WithPagination;

    public function incrementView($id)
    {
        $blog=Blog::findOrFail($id);
        $views=$blog->views + 1;
        $blog->views=$views;
        $blog->save();
    }

    public function incrementViewF($id)
    {
        $blog=Flight::findOrFail($id);
        $views=$blog->views + 1;
        $blog->views=$views;
        $blog->save();
    }

    public function render()
    {
        $posts=Blog::latest()->paginate($this->pages);

        $this->sliderPost=Blog::latest()->limit(3)->get();

        $this->flightCategory=FlightCategory::latest()->limit(3)->get();

        $this->flights=Flight::latest()->limit(6)->get();

        return view('livewire.pages.home',['posts'=>$posts])->layout('layouts.app');
    }


}
