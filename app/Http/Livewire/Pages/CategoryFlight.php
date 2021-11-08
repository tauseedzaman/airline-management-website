<?php

namespace App\Http\Livewire\Pages;

use App\Models\Flight;
use App\Models\FlightCategory;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFlight extends Component
{

    public $category_name;

    use WithPagination;
    public function mount($slug)
    {
        $this->category_name=$slug;
    }
    public function render()
    {
        $categorys=FlightCategory::where('category_name',$this->category_name)->first();
        $cat_id=$categorys->id;
        $flights=Flight::orderBy('id','DESC')->where('cat_id',$cat_id)->paginate(10);
        return view('livewire.pages.category-flight',['flights'=>$flights])->layout('layouts.app');
    }
}
