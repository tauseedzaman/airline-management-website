<div>
    <x-slot name="title">My Booking</x-slot>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-2 text-white">
            My Booking
        </h1>
        <div class="pages d-flex justify-content-center align-items-center">
            <span class="mr-2">Home</span> <span>/</span>
            <span class="mx-2"> Dashboard </span>/
            <span class="ml-2"> My booking</span>
        </div>
    </div>

    <div class="my_card">
        <div class="table-responsive">
            <div class="d-flex justify-content-between py-2 align-items-center">
                <div>
                    <h4>Booking Results</h4>
                    <span>Showing 1 to 7 of 17 entries</span>
                </div>
                <div>
                    <span>Total Bookings (17)</span>
                </div>
            </div>
            <hr>
            <table class="table">
                <thead class="color-gray border-bottom">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Order Date</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($booking as $book)
                    <tr class="border-bottom">
                        <td>{{$book->id}}</td>
                        <td>{{$book->flights->name}}</td>
                        <td>{{$book->user->username}}</td>
                        <td>{{$book->created_at}}</td>
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
                                echo '$ '.$total_price
                                @endphp
                                @endif
                        </td>
                        <td><span class="pending">Pending</span></td>
                        <td><button wire:click='delete({{$book->id}})' class="my_btn" style="cursor: pointer">Cancel</button></td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

    {{$booking->links()}}

</div>