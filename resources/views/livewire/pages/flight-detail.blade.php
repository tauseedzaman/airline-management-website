<div>
    <x-slot name="title">{{$flightDetail->name}}</x-slot>
    <div class="site-blocks-cover inner-page-cover" style="background-image: url({{asset('storage')}}/{{$flightDetail->image}});"
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light">{{$flightDetail->name}}</h1>
                    <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span
                            class="text-white">FlightDetail</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="d-flex justify-content-between">
                    <h5>Likes ( {{$total_likes}} )</h5>
                    <h5>View ( {{$flightDetail->views}} )</h5>
                </div>
                <img src="{{asset('storage')}}/{{$flightDetail->image}}" style="width: 100%;" alt="">
                <h5 class="my-4">{{$flightDetail->title}}</h5>
                <h6 class="text-info">Note:
                    20 kg wait a allowed after That you will pay per 1kg $20
                </h6>
                @auth
                <button wire:click='like({{$flightDetail->id}})' class="btn btn-primary">Like  ( {{$total_likes}} )</button>
                @endauth
                @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Like  ( {{$total_likes}} )</a>
                @endguest
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <h3 class="mt-5">{{$flightDetail->name}}</h3>
                <h5>Departure : {{$flightDetail->departure}}</h5>
                <h5>Arival : {{$flightDetail->arrival}}</h5>
                <h6>Price :$ {{$flightDetail->price}}</h6>
                <p>
                    @php
                    echo $flightDetail->description;
                    @endphp
                </p>
                <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="seat">Seats</label>
                        <select name="seat" wire:model='seat' id="seat" class="form-control">
                            <option> --- Select any seats---- </optiond>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <span class="text-danger">@error('seat')
                            {{$message}}
                            @enderror</span>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="wait">Wait in Kg (20)</label>
                        <input type="number" name="kg" wire:model='kg' id="kg" class="form-control">
                        <span class="text-danger">@error('kg')
                            {{$message}}
                            @enderror</span>
                    </div>
                </div>
                @auth
                <button wire:click='bookFlight({{$flightDetail->id}})' class="btn btn-info">Book</button>
                @endauth
                @guest
                <a href="{{ route('login') }}" class="btn btn-info">Book</a>
                @endguest

            </div>
        </div>
        <form action="" wire:submit.prevent='submit_comment({{$flightDetail->id}})'>
            <label class="text-black" for="review">Enter reviews</label>
            <select name="review" wire:model='review' id="review" class="form-control">
                <option> --- Reviews ---- </optiond>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <span class="text-danger">@error('review')
                {{$message}}
                @enderror</span>
            <div class="form-group">
                <label class="text-black" for="wait">Enter the Comment</label>
                <textarea name="comment" id="comment" wire:model='comment' cols="30" rows="10"
                    class="form-control"></textarea>
                <span class="text-danger">@error('comment')
                    {{$message}}
                    @enderror</span>
            </div>

            @auth
            <button wire:click='like({{$blogDetail->id}})' class="btn btn-primary my-3">Submit</button>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="btn btn-primary my-3">Submit</a>
            @endguest
        </form>

        @forelse ($getReviews as $review)
        <div class="reviews">
            <div class="left-side-review mr-5">
                <img src="{{asset('storage')}}/{{$review->user->image}}" alt="">
            </div>
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
        @empty
        <h4>Rerivew Not Found</h4>
        @endforelse

    </div>

</div>