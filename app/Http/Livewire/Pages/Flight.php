<?php

namespace App\Http\Livewire\Pages;

use App\Models\Flight as ModelsFlight;
use Livewire\Component;
use Livewire\WithPagination;

class Flight extends Component
{
    use WithPagination;
    public function render()
    {
        $flights=ModelsFlight::orderBy('id','DESC')->paginate(10);
        return view('livewire.pages.flight',['flights'=>$flights])->layout("layouts.app");
    }

    public function incrementView($id)
    {
        $flight=ModelsFlight::find($id);
        $views=$flight->views + 1;
        $flight->views=$views;
        $flight->save();
    }
}
