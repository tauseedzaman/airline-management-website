<?php

namespace App\Http\Livewire\Admin;

use App\Models\BookFlight as ModelsBookFlight;
use Livewire\Component;
use Livewire\WithPagination;

class BookFlight extends Component
{
    use WithPagination;
    public function render()
    {
        $booking=ModelsBookFlight::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.book-flight',['booking'=>$booking])->layout('layouts.admin-app');
    }

    public function accept($id)
    {
        $book=ModelsBookFlight::findOrFail($id);
        $book->status=1;
        $book->save(); 
    }
    public function reject($id)
    {
        $book=ModelsBookFlight::findOrFail($id);
        $book->status=2;
        $book->save(); 
    }
    public function delete($id)
    {
        $book=ModelsBookFlight::findOrFail($id);
        $book->delete(); 
    }
}
