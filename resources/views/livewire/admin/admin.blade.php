<div>
    <x-slot name="title">Post</x-slot>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4> Admins ( 44 ) </h4>
                    <button wire:click="showForm()" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
        @if ($createData == true)
        <div class="container">
            <h1 class="text-center my-3">Registration From</h1>
    
            <div class="row">
                <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-12 mb-5">
                    <form action="#" class="p-5 bg-white" wire:submit.prevent='store'>
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname">First Name</label>
                                <input type="text" name="fname" wire:model='fname' id="fname" class="form-control">
                                <span class="text-danger">@error('fname')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black" for="lname">Last Name</label>
                                <input type="text" wire:model='lname' id="lname" class="form-control">
                                <span class="text-danger">@error('lname')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="username">Username</label>
                                <input type="text" wire:model='username' id="username" class="form-control">
                                <span class="text-danger">@error('username')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" wire:model='email' id="email" class="form-control">
                                <span class="text-danger">@error('email')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="roll">Roll</label>
                                <select class="form-control" wire:model='roll' name="roll" id="roll">
                                    <option value="">select a admin </option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                                <span class="text-danger">@error('roll')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="phone">Phone</label>
                                <input type="number" wire:model='phone' id="phone" class="form-control">
                                <span class="text-danger">@error('phone')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="password">Password</label>
                                <input type="password" wire:model='password' id="password" class="form-control">
                                <span class="text-danger">@error('password')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="file">Image</label>
                                <input type="file" wire:model='file' id="file" class="form-control">
                                @if ($file )
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
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fname</th>
                            <th>Lname</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->fname}}</td>
                            <td>{{$admin->lname}}</td>
                            <td>{{$admin->username}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->roll == 1 ? 'Admin':'Normal'}}</td>
                            <td>{{$admin->phone}}</td>
                            <td><img src="{{ asset('storage') }}/{{$admin->image}}" style="width: 70px;height:70px;" alt=""></td>
                            <td><button wire:click='edit({{$admin->id}})' class="btn btn-success">Edit</button></td>
                            <td><button wire:click='delete({{$admin->id}})' class="btn btn-danger">Delete</button></td>
                        </tr>
                        @empty
                        <h2>Recored not found</h2>
                        @endforelse
                    </tbody>
                </table>
                {{$admins->links()}}
            </div>
        </div>
        @endif

    </div>

    {{-- update data --}}

    @if ($updateData == true)
    <div class="container">
        <h1 class="text-center my-3">Update Admin</h1>

        <div class="row">
            <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-12 mb-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='update({{$ids}})'>
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="edit_fname">First Name</label>
                            <input type="text" name="edit_fname" wire:model='edit_fname' id="edit_fname" class="form-control">
                            <span class="text-danger">@error('edit_fname')
                                {{$message}}
                                @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="edit_lname">Last Name</label>
                            <input type="text" wire:model='edit_lname' id="edit_lname" class="form-control">
                            <span class="text-danger">@error('edit_lname')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="edit_username">Username</label>
                            <input type="text" wire:model='edit_username' id="edit_username" class="form-control">
                            <span class="text-danger">@error('edit_username')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" wire:model='edit_email' id="edit_email" class="form-control">
                            <span class="text-danger">@error('edit_email')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="roll">Roll</label>
                            <select class="form-control" wire:model='edit_roll' name="roll" id="roll">
                                <option value="">select a admin </option>
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                            <span class="text-danger">@error('edit_roll')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="phone">Phone</label>
                            <input type="number" wire:model='edit_phone' id="edit_phone" class="form-control">
                            <span class="text-danger">@error('edit_phone')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="file">Image</label>
                            <input type="file" wire:model='new_file' id="new_file" class="form-control">
                            @if ($new_file )
                            <img src="{{$new_file->temporaryUrl()}}" style="width: 70px;height:70px;" alt="">
                            @else
                            <img src="{{asset('storage')}}/{{$file}}" style="width: 70px;height:70px;" alt="">

                            @endif
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