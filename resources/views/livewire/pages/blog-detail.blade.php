<div>
    <x-slot name="title">{{$blogDetail->title}}</x-slot>
    <div class="site-blocks-cover inner-page-cover" style="background-image: url({{asset('storage')}}/{{$blogDetail->image}})"
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light">{{$blogDetail->title}}</h1>
                    <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span
                            class="text-white">BlogDetail</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">

        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-12 offset-xl-2 offset-md-2 offset-sm-0">
                <div class="d-flex justify-content-between">
                    <h5>Likes ( 10 )</h5>
                    <h5>View ( {{$blogDetail->views}} )</h5>
                </div>
                <img src="{{asset('storage')}}/{{$blogDetail->image}}" style="width: 100%;" alt="">
                <h5 class="my-4">{{$blogDetail->title}}</h5>
                <p>
                    @php
                    echo $blogDetail->description;
                    @endphp
                </p>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-primary border-2 my-5">Comment ( {{$getComments->count() }} )</button>
                    @auth
                    <button wire:click='like({{$blogDetail->id}})' class="btn btn-outline-primary border-2 my-5">Likes  ( {{$total_likes}} )</button>

                    @endauth

                    @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary border-2 my-5">Likes</a>
                    @endguest
                </div>

                <form action="" wire:submit.prevent='submit_comment({{$blogDetail->id}})'>
                    <div class="form-group">
                        <label class="text-black" for="comment">Enter the Comment</label>
                        <textarea name="comment" id="comment" wire:model='comment' cols="30" rows="10"
                            class="form-control"></textarea>
                        <span class="text-danger">@error('comment')
                            {{$message}}
                            @enderror</span>
                    </div>
                    @auth
                    <button class="btn btn-primary my-3">Submit</button>
                    @endauth

                    @guest
                    <a href="{{ route('registration') }}" class="btn btn-primary my-3">Submit</a>
                    @endguest
                </form>
                @forelse ($getComments as $review)
                <div class="reviews">
                    <div class="left-side-review mr-5">
                        <img src="{{asset('storage')}}/{{$review->users->image}}" alt="">
                    </div>
                    <div class="right-side-review">
                        <h3>{{$review->users->username}}</h3>
                        <span>April 5, 2019</span>
                        <p class="mt-3">
                            {{$review->comment}}
                        </p>
                    </div>
                </div>
                <hr>
                @empty
                <h4>Rerivew Not Found</h4>
                @endforelse
            </div>
        </div>
    </div>
</div>
