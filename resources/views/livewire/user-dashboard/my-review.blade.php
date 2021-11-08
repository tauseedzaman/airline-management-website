<div>
    <x-slot name="title">My Reviews</x-slot>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-2 text-white">
            My Reviews
        </h1>
        <div class="pages d-flex justify-content-center align-items-center">
            <span class="mr-2">Home</span> <span>/</span>
            <span class="mx-2"> Dashboard </span>/
            <span class="ml-2"> My Reviews</span>
        </div>
    </div>
    <div class="my_card">
        <div class="table-responsive">
            <div class="d-flex justify-content-between py-2 align-items-center">
                <div>
                    <h4>Reviews</h4>
                </div>
                <div>
                    <span>Total Bookings ({{count($total_reviews)}})</span>
                </div>
            </div>
            <hr>
            @forelse ($reviews as $review)
            <div class="reviews">
                <div class="left-side-review mr-5">
                    <img src="{{asset('storage')}}/{{$review->user->image}}" alt="">
                </div>
                <div class="right-side-review">
                    <div class="right-side-review">
                        <h3>{{$review->user->username}}</h3>
                        @if ($review->review == 5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        @endif

                        @if ($review->review ==4)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        @endif
                        @if ($review->review ==3)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @endif
                        @if ($review->review ==2)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @endif

                        @if ($review->review ==1)
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @endif
                        <span>April 5, 2019</span>
                        <p class="mt-3">
                            {{$review->comment}}
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            @empty
            <h3>Review Not Found</h3>
            @endforelse
        </div>

    </div>
    {{$reviews->links()}}

</div>