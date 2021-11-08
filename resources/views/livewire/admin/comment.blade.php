<div>
    <x-slot name="title">Comments</x-slot>
    <div class="table-responsive my-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Plane Name</th>
                    <th>Username</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->posts->title}}</td>
                    <td>{{$comment->users->username}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>@if ($comment->status == 0)
                        <button wire:click='reject({{$comment->id}})' class="btn btn-danger">Reject</button>
                        <button wire:click='accept({{$comment->id}})' class="btn btn-success">Accept</button>
                        
                    @endif
                    @if ($comment->status == 1)
                        <span class="text-success">Accept</span>
                    @endif
                    @if ($comment->status == 2)
                    <span class="text-danger">Reject</span>
                        
                    @endif
                </td>
                    <td><button wire:click='delete({{$comment->id}})' class="btn btn-danger">Delete</button></td>
                </tr>
                @empty
                <h4>Record Not Found</h4>
                @endforelse
            </tbody>
        </table>
        {{$comments->links()}}
    </div>
</div>