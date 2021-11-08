@props(['sliderPost'])
<div class="slide-one-item home-slider owl-carousel">
    @forelse ($sliderPost as $post)
    <div class="site-blocks-cover overlay" style="background-image:url({{asset('storage')}}/{{$post->image}});" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light">{{$post->title}}</h1>
                    <p class="mb-5">{{$post->description}}<p>
                    <p><a wire:click='incrementView({{$post->id}})' href="{{ route('blogdetail', ['slug'=>$post->slug]) }}" class="btn btn-primary py-3 px-5 text-white">More ...</a></p>

                </div>
            </div>
        </div>
    </div>
    @empty

    @endforelse
</div>
