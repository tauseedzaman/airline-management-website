<div>
    <x-slot name="title">Post</x-slot>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4> posts ( 44 ) </h4>
                    <button wire:click="showForm()" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
        @if ($createData == true)
        <div class="container">
            <h1 class="my-3">Update Post </h1>
            <div class="row">
                <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-1 offset-md-2 offset-sm-12 mb-5">
                    <form action="#" class="p-5 bg-white" wire:submit.prevent='store'>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="title">Title</label>
                                <input type="text" wire:model.lazy='title' id="title" class="form-control">
                                <span class="text-danger">@error('title')
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
                                <label class="text-black" for="desc">Description</label>
                                <textarea name="desc" wire:model.lazy='desc' id="desc" cols="30" rows="10"
                                    class="form-control"></textarea>
                                <span class="text-danger">@error('desc')
                                    {{$message}}
                                    @enderror</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="new_file">Image</label>
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
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Title</th>
                        <th>Views</th>
                        <th>Roll</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->admins->username}}</td>
                        <td>{{$post->category->category_name}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->views}}</td>
                        <td>{{$post->admins->roll === 1 ? "Admin":"Normal"}}</td>
                        <td><img src="{{asset('storage')}}/{{$post->image}}" style="width: 70px;height:70px;" alt=""></td>
                        <td><button wire:click='edit({{$post->id}})' class="btn btn-primary">Edit</button></td>
                        <td><button wire:click='delete({{$post->id}})' class="btn btn-danger">Delete</button></td>
                    </tr>
                    @empty
                    <h4>Record Not Found</h4>
                    @endforelse
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
        @endif

    </div>

    {{-- update data --}}

    @if ($updateData == true)
    <div class="container">
        <h1 class="my-3">Update Post </h1>
        <div class="row">
            <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-1 offset-md-2 offset-sm-12 mb-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='update({{$ids}})'>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="edit_title">Title</label>
                            <input type="text" wire:model.lazy='edit_title' id="edit_title" class="form-control">
                            <span class="text-danger">@error('edit_title')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="category">Category</label>
                            <select name="edit_cat_id" wire:model.lazy='edit_cat_id' id="edit_cat_id" class="form-control">
                                <option value="" disabled>Disabled value</option>
                                @foreach ($categorys as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('edit_cat_id')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="desc">Description</label>
                            <textarea name="edit_desc" wire:model.lazy='edit_desc' id="edit_desc" cols="30" rows="10"
                                class="form-control"></textarea>
                            <span class="text-danger">@error('desc')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="new_file">Image</label>
                            <input type="file" wire:model.lazy='new_file' id="new_file" class="form-control">
                            @if ($new_file)
                            <img src="{{$new_file->temporaryUrl()}}" style="width: 70px;height:70px;" alt="">
                            @else
                            <img src="{{asset("storage")}}/{{$old_file}}" style="width: 70px;height:70px;" alt="">
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