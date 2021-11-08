<div>
    <x-slot name="title">Reviews</x-slot>
    <div class="table-responsive my-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Plane Name</th>
                    <th>Username</th>
                    <th>Reviews</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reviews as $review)
                <tr>
                    <td>{{$review->id}}</td>
                    <td>{{$review->flights->name}}</td>
                    <td>{{$review->user->username}}</td>
                    <td>{{$review->review}}</td>
                    <td>{{$review->comment}}</td>
                    <td>@if ($review->status == 0)
                        <button wire:click='reject({{$review->id}})' class="btn btn-danger">Reject</button>
                        <button wire:click='accept({{$review->id}})' class="btn btn-success">Accept</button>
                        
                    @endif
                    @if ($review->status == 1)
                        <span class="text-success">Accept</span>
                    @endif
                    @if ($review->status == 2)
                    <span class="text-danger">Reject</span>
                        
                    @endif
                </td>
                    <td><button wire:click='delete({{$review->id}})' class="btn btn-danger">Delete</button></td>
                </tr>
                @empty
                <h4>Record Not Found</h4>
                @endforelse
            </tbody>
        </table>
        {{$reviews->links()}}
    </div>
</div>