<div>
    <x-slot name="title">Booking Flight</x-slot>
    <div class="table-responsive my-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Plane Name</th>
                    <th>Username</th>
                    <th>Price</th>
                    <th>Wait</th>
                    <th>Seats</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($booking as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->flights->name}}</td>
                    <td>{{$book->user->username}}</td>
                    <td>{{$book->flights->price}}</td>
                    <td>{{$book->wait}}</td>
                    <td>{{$book->seats}}</td>
                    <td>
                        @if ($book->wait > 20)
                        @php
                        $seats=$book->seats;
                        $new_wait=$book->wait - 20;
                        $seat_price=$book->flights->price*$seats;
                        $new_price=30*$new_wait;
                        $price=$seat_price+$new_price;

                        echo '$ '.$price;
                        @endphp
                        @endif
                        @if ($book->wait <=20) @php $seats=$book->seats;
                            $price=$book->flights->price;
                            $total_price=$price*$seats;
                            echo '$ '.$total_price;
                            @endphp
                            @endif
                    </td>
                    <td>@if ($book->status == 0)
                        <button wire:click='reject({{$book->id}})' class="btn btn-danger">Reject</button>
                        <button wire:click='accept({{$book->id}})' class="btn btn-success">Accept</button>
                        
                    @endif
                    @if ($book->status == 1)
                        <span class="text-success">Accept</span>
                    @endif
                    @if ($book->status == 2)
                    <span class="text-danger">Reject</span>
                        
                    @endif
                </td>
                    <td><button wire:click='delete({{$book->id}})' class="btn btn-danger">Delete</button></td>
                </tr>
                @empty
                <h4>Record Not Found</h4>
                @endforelse
            </tbody>
        </table>
        {{$booking->links()}}
    </div>
</div>