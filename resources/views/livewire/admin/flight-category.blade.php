<div>
    <x-slot name="title">Flight Category</x-slot>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4> Category ( 44 ) </h4>
                    <button wire:click="showForm()" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
        @if ($createData == true)
        <div class="container">
            <h1 class="my-3">Add Flight Category </h1>
            <div class="row">
                <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-1 offset-md-2 offset-sm-12 mb-5">
                    <form action="#" class="p-5 bg-white" wire:submit.prevent='store'>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="category">Category Name</label>
                                <input type="text" wire:model.lazy='category_name' id="category_name"
                                    class="form-control">
                                <span class="text-danger">@error('category_name')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="file">Image</label>
                                <input type="file" wire:model.lazy='file' id="file" class="form-control">
                                @if ($file)
                                    <img src="{{$file->temporaryUrl()}}" style="width: 70px;height:70px;" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary py-2 px-4 text-white">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        @endif

        @if ($showData == true)
        <div class="table-responsive my-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Flight</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($flightCategorys as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td><img src="{{ asset('storage') }}/{{$category->image}}" style="width: 70px;height:70px;" alt=""></td>
                        <td>{{$category->flight}}</td>
                        <td><button wire:click='edit({{$category->id}})' class="btn btn-primary">Edit</button></td>
                        <td><button wire:click='delete({{$category->id}})' class="btn btn-danger">Delete</button></td>
                    </tr>
                    @empty
                    <h4>Record Not Found</h4>
                    @endforelse
                </tbody>
            </table>
            {{$flightCategorys->links()}}
        </div>
        @endif

    </div>

    {{-- update data --}}

    @if ($updateData == true)
    <div class="container">
        <h1 class="my-3">Update Flight Category </h1>
        <div class="row">
            <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-1 offset-md-2 offset-sm-12 mb-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='update({{$ids}})'>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="edit_category_name">Category</label>
                            <input type="text" wire:model.lazy='edit_category_name' id="edit_category_name" class="form-control">
                            <span class="text-danger">@error('edit_category_name')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="file">Image</label>
                            <input type="file" wire:model.lazy='new_file' id="new_file" class="form-control">
                            @if ($new_file)
                            <img src="{{$new_file->temporaryUrl()}}" style="width: 70px;height:70px;" alt="">
                            @else
                            <img src="{{asset('storage')}}/{{$old_file}}" style="width: 70px;height:70px;" alt="">
                            @endif
                            <input type="text" wire:model.lazy='old_file' id="old_file" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary py-2 px-4 text-white">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endif
</div>