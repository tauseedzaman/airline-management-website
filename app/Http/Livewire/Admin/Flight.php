<?php

namespace App\Http\Livewire\Admin;

use App\Models\Flight as ModelsFlight;
use App\Models\FlightCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Flight extends Component
{
    public $name;
    public $cat_id;
    public $dep;
    public $arrival;
    public $seat;
    public $file;
    public $price;
    public $description;

    public $createData = false;
    public $showData = true;
    public $updateData = false;
    public $categorys;

    public $ids;
    public $edit_name;
    public $edit_cat_id;
    public $edit_dep;
    public $edit_arrival;
    public $edit_seat;
    public $new_file;
    public $old_file;
    public $edit_price;
    public $edit_description;

    use WithFileUploads;
    use WithPagination;
    public function render()
    {
        if(Auth::guard('admin')->user()->roll == 1){
            $flights = ModelsFlight::orderBy('id', 'DESC')->paginate(5);
        }else{
            $flights = ModelsFlight::orderBy('id', 'DESC')->where('admin_id',Auth::guard('admin')->user()->id)->paginate(5);

        }
        $this->categorys = FlightCategory::get();
        return view('livewire.admin.flight', ['flights' => $flights])->layout('layouts.admin-app');
    }

    public function showForm()
    {
        $this->createData=true;
        $this->showData=false;
    }

    public function store()
    {
        $flights = new ModelsFlight();

        $this->validate([
            'name' => 'required',
            'cat_id' => 'required',
            'dep' => 'required',
            'arrival' => 'required',
            'seat' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $filename = "";
        if ($this->file != null) {
            $filename = $this->file->store("upload/flights", 'public');
        } else {
            $filename = null;
        }

        $flights->name = $this->name;
        $flights->cat_id = $this->cat_id;
        $flights->admin_id = 1;
        $flights->departure = $this->dep;
        $flights->arrival = $this->arrival;
        $flights->seats= $this->seat;
        $flights->price = $this->price;
        $flights->image = $filename;
        $flights->views = 0;
        $flights->description = $this->description;
        $flights->slug = Str::slug($this->name);
        $flights->save();

        $this->createData=false;
        $this->showData=true;
    }

    public function edit($id)
    {
        $this->updateData=true;
        $this->showData=false;

        $flights = ModelsFlight::findOrFail($id);
        $this->ids=$flights->id;
        $this->edit_name=$flights->name;
        $this->edit_arrival=$flights->arrival;
        $this->edit_dep=$flights->departure;
        $this->edit_cat_id=$flights->cat_id;
        $this->edit_description=$flights->description;
        $this->edit_seat=$flights->seats;
        $this->edit_price=$flights->price;
        $this->old_file=$flights->image;
    }

    public function update($id)
    {
        
        $flights = ModelsFlight::findOrFail($id);

        $this->validate([
            'edit_name' => 'required',
            'edit_cat_id' => 'required',
            'edit_dep' => 'required',
            'edit_arrival' => 'required',
            'edit_seat' => 'required',
            'edit_price' => 'required',
            'edit_description' => 'required',
        ]);
        $filename = "";
        $destination = public_path('storage\\' . $flights->image);
        if ($this->new_file != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_file->store("upload/flights", 'public');
        } else {
            $filename = $this->old_file;
        }

        $flights->name = $this->edit_name;
        $flights->cat_id = $this->edit_cat_id;
        $flights->departure = $this->edit_dep;
        $flights->arrival = $this->edit_arrival;
        $flights->seats = $this->edit_seat;
        $flights->price = $this->edit_price;
        $flights->image = $filename;
        $flights->description = $this->edit_description;
        $flights->slug = Str::slug($this->edit_name);
        $flights->save();

        $this->updateData=false;
        $this->showData=true;
    }

    public function delete($id)
    {
        $flights = ModelsFlight::findOrFail($id);
        $destination = public_path('storage\\' . $flights->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $flights->delete();
    }
}
