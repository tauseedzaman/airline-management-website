<div>
    <x-slot name="title">Flight</x-slot>

    <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light">Flight</h1>
                    <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span
                            class="text-white">Flight</span></div>
                </div>
            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row mb-3 align-items-stretch">
                @forelse ($flights as $flight)
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <a wire:click='incrementView({{$flight->id}})' href="{{ route('flightdetail', ['slug'=>$flight->slug]) }}"> <img src="{{asset('storage')}}/{{$flight->image}}"
                            alt="Image" class="img-fluid"></a>
                        <h2 class="font-size-regular"><a wire:click='incrementView({{$flight->id}})'
                                href="{{ route('flightdetail', ['slug'=>$flight->slug]) }}">{{$flight->name}}</a></h2>
                        <div class="meta mb-2">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at
                            2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div> 
                            <div class="d-flex justify-content-between">
                            <span class="text-info">views ( {{$flight->views}} )</span>
                            <span class="text-info">Likes ( {{$flight->views}} )</span>
                            </div>
                        <p>{{$flight->description}}</p>
                    </div>
                </div>
                @empty
                <h1>Record Not Found</h1>
                @endforelse

            </div>
            <div class="row">
                <div class="col-12 text-center">
                    {{$flights->links()}}
                </div>
            </div>
        </div>
    </div>

</div>