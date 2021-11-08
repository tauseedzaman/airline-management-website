<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{

    public $category_name;

    public $createData=false;
    public $updateData=false;
    public $showData=true;

    public $ids;
    public $edit_category;

    public $total_cateogory;
    use WithPagination;
    public function render()
    {
        $categorys=Categorie::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.category',['categorys'=>$categorys])->layout("layouts.admin-app");
    }

    public function showForm()
    {
        $this->createData=true;
        $this->showData=false;
    }

    public function store()
    {
        $category=new Categorie();
        $this->validate([
            'category_name'=>"required"
        ]);

        $category->category_name=$this->category_name;
        $category->posts=0;

        $category->save();

        $this->category_name="";
        $this->createData=false;
        $this->showData=true;
        
    }


    public function edit($id)
    {

        $this->updateData=true;
        $this->showData=false;
        $categorys=Categorie::findOrFail($id);
        $this->ids=$categorys->id;
        $this->edit_category=$categorys->category_name;
    }

    public function update($id)
    {
        $categorys=Categorie::findOrFail($id);
        $this->validate([
            'edit_category'=>'required',
        ]);

        $categorys->category_name = $this->edit_category;
        $categorys->save();

        $this->updateData=false;
        $this->showData=true;
    }

    public function delete($id)
    {
        // $post=new Blog();
        // $post->delete($id);
        $categorys=Categorie::findOrFail($id);
        $categorys->delete();
    }
}
