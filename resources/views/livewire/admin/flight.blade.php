<div>
    <x-slot name="title">Flights</x-slot>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4> Flight ( 44 ) </h4>
                    <button wire:click="showForm()" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
        @if ($createData == true)
        <div class="container">
            <h1 class="my-3">Add Flight </h1>
            <div class="row">
                <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-1 offset-md-2 offset-sm-12 mb-5">
                    <form action="#" class="p-5 bg-white" wire:submit.prevent='store'>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="name">Name</label>
                                <input type="text" wire:model.lazy='name' id="name" class="form-control">
                                <span class="text-danger">@error('name')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="category">Category</label>
                                <select name="cat_id" wire:model.lazy='cat_id' id="cat_id" class="form-control">
                                    <option value="" disabled>Disabled value</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('cat_id')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
    
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="dep">Departure</label>
                                <input type="time" wire:model='dep' name="dep" id="" class="form-control">
                                <span class="text-danger">@error('dep')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="arrival">Arrival</label>
                                <input type="time" wire:model='arrival' name="arrival" id="arrival" class="form-control">
                                <span class="text-danger">@error('arrival')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="seat">Seats</label>
                                <input type="number" wire:model='seat' name="seat" id="seat" class="form-control">
                                <span class="text-danger">@error('seat')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="price">Price</label>
                                <input type="number" wire:model='price' name="price" id="price" class="form-control">
                                <span class="text-danger">@error('price')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="description">description</label>
                                <textarea name="description" wire:model.lazy='description' id="description" cols="30" rows="10"
                                    class="form-control"></textarea>
                                <span class="text-danger">@error('description')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="file">Image</label>
                                <input type="file" wire:model='file' id="file" class="form-control">
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
                        <th>User</th>
                        <th>Category Name</th>
                        <th>Name</th>
                        <th>Views</th>
                        <th>Seats</th>
                        <th>Price</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Roll</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($flights as $flight)
                    <tr>
                        <td>{{$flight->id}}</td>
                        <td>{{$flight->admins->username}}</td>
                        <td>{{$flight->category->category_name}}</td>
                        <td>{{$flight->name}}</td>
                        <td>{{$flight->views}}</td>
                        <td>{{$flight->seats}}</td>
                        <td>{{$flight->price}}</td>
                        <td>{{$flight->arrival}}</td>
                        <td>{{$flight->departure}}</td>
                        <td>{{$flight->admins->roll === 1 ? "Admin":"Normal"}}</td>
                        <td><img src="{{asset('storage')}}/{{$flight->image}}" style="width: 70px;height:70px;" alt=""></td>
                        <td><button wire:click='edit({{$flight->id}})' class="btn btn-primary">Edit</button></td>
                        <td><button wire:click='delete({{$flight->id}})' class="btn btn-danger">Delete</button></td>
                    </tr>
                    @empty
                    <h4>Record Not Found</h4>
                    @endforelse
                </tbody>
            </table>
            {{$flights->links()}}
        </div>
        @endif

    </div>

    {{-- update data --}}

    @if ($updateData == true)
    <div class="container">
        <h1 class="my-3">Update Flight </h1>
        <div class="row">
            <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-1 offset-md-2 offset-sm-12 mb-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='update({{$ids}})'>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="name">Name</label>
                            <input type="text" wire:model.lazy='edit_name' id="edit_name" class="form-control">
                            <span class="text-danger">@error('edit_name')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="category">Category</label>
                            <select name="edit_cat_id" wire:model.lazy='edit_cat_id' id="edit_cat_id" class="form-control">
                                <option value="">Disabled value</option>
                                @foreach ($categorys as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('cat_id')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="dep">Departure</label>
                            <input type="time" wire:model='edit_dep' name="edit_dep" id="" class="form-control">
                            <span class="text-danger">@error('edit_dep')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="arrival">Arrival</label>
                            <input type="time" wire:model='edit_arrival' name="edit_arrival" id="edit_arrival" class="form-control">
                            <span class="text-danger">@error('edit_arrival')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="seat">Seats</label>
                            <input type="text" wire:model='edit_seat' name="edit_seat" id="edit_seat" class="form-control">
                            <span class="text-danger">@error('edit_seat')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="price">Price</label>
                            <input type="text" wire:model='edit_price' name="edit_price" id="edit_price" class="form-control">
                            <span class="text-danger">@error('edit_price')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="description">description</label>
                            <textarea name="description" wire:model.lazy='edit_description' id="edit_description" cols="30" rows="10"
                                class="form-control"></textarea>
                            <span class="text-danger">@error('edit_description')
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
                            <img src="{{ asset('storage') }}/{{$old_file}}" style="width: 70px;height:70px;" alt="">
                            @endif
                            <input type="text" wire:model.lazy='old_file' id="old_file" class="form-control">
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
</div>