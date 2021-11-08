<?php

namespace App\Http\Livewire\Admin;

use App\Models\FlightCategory as ModelsFlightCategory;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FlightCategory extends Component
{
    public $category_name;
    public $file;

    public $createData = false;
    public $showData = true;
    public $updateData = false;

    public $ids;
    public $edit_category_name;
    public $new_file;
    public $old_file;

    use WithFileUploads;
    use WithPagination;
    public function render()
    {
        $flightCategorys = ModelsFlightCategory::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.flight-category', ['flightCategorys' => $flightCategorys])->layout('layouts.admin-app');
    }

    public function showForm()
    {
        $this->createData = true;
        $this->showData = false;
    }

    public function store()
    {
        $flightCategorys = new ModelsFlightCategory();

        $this->validate([
            'category_name'=>'required'
        ]);

        $filename = "";
        if ($this->file != null) {
            $filename = $this->file->store("upload/flightcategory", 'public');
        } else {
            $filename = null;
        }

        $flightCategorys->category_name = $this->category_name;
        $flightCategorys->image = $filename;
        $flightCategorys->flight = 0;
        $flightCategorys->save();

        $this->showData = true;
        $this->createData = false;
    }

    public function edit($id)
    {
        $this->updateData = true;
        $this->showData = false;

        $flightCategorys = ModelsFlightCategory::findOrFail($id);
        $this->ids = $flightCategorys->id;
        $this->edit_category_name = $flightCategorys->category_name;
        $this->old_file = $flightCategorys->image;
    }

    public function update($id)
    {
        $flightCategorys = ModelsFlightCategory::findOrFail($id);

        $this->validate([
            'edit_category_name'=>'required'
        ]);
        $filename = "";
        $destination = public_path('storage\\' . $flightCategorys->image);
        if ($this->new_file != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_file->store("upload/flightcategory", 'public');
        } else {
            $filename = $this->old_file;
        }

        $flightCategorys->category_name = $this->edit_category_name;
        $flightCategorys->image = $filename;
        $flightCategorys->save();

        $this->showData = true;
        $this->updateData = false;
    }


    public function delete($id)
    {

        $flightCategorys=ModelsFlightCategory::findOrFail($id);
        $destination = public_path('storage\\' . $flightCategorys->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $flightCategorys->delete();
    }
}
