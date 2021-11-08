<div>
    <x-slot name="title">Users</x-slot>
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
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->fname}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td><img src="{{ asset('storage') }}/{{$user->image}}" style="width: 70px;height:70px;" alt=""></td>
                        <td><button wire:click='delete({{$user->id}})' class="btn btn-danger">Delete</button></td>
                    </tr>
                    @empty
                    <h2>Recored not found</h2>
                    @endforelse
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</div>