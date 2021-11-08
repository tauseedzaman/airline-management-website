<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\BookFlight;
use App\Models\Like;
use App\Models\FlightCategory;
use App\Models\Categorie;
use App\Models\Flight;
use Livewire\Component;

class Dashboard extends Component
{

	public $posts;
	public $likes;
	public $flightCategory;
	public $category;
	public $flights;
	public $bookFlights;
    public function render()
    {
    	$this->posts=Blog::get();
    	$this->likes=Like::sum('like');
    	$this->flightCategory=FlightCategory::get();
    	$this->category=Categorie::get();
    	$this->flights=Flight::get();
    	$this->bookFlights=BookFlight::get();
        return view('livewire.admin.dashboard')->layout('layouts.admin-app');
    }
}
