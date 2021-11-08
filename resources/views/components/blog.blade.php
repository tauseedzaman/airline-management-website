<div class="container">
    @props(['posts'])
    <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Blog</h2>
            <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>
        </div>
    </div>
    <div class="row mb-3 align-items-stretch">
        @forelse ($posts as $post)
        <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
                <img src="{{asset('storage')}}/{{$post->image}}" alt="Image" class="img-fluid">
                <h2 class="font-size-regular"><a wire:click='incrementView({{$post->id}})' href="{{ route('blogdetail', ['slug'=>$post->slug]) }}">{{$post->title}}</a></h2>
                <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> {{ $post->created_at->format("M d, Y") }}  at
                    {{ $post->created_at->format("H:m") }} <span class="mx-2">&bullet;</span> <a href="#">{{ $post->category->category_name }}</a></div>
                <p>
                    {{$post->description}}
                </p>
            </div>
        </div>
        @empty
        <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
                <img src="images/hero_bg_2.jpg" alt="Image" class="img-fluid">
                <h2 class="font-size-regular"><a href="#">How to Plan Your Vacation</a></h2>
                <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at
                    2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                    sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
            </div>
        </div>
        @endforelse
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ route('blog') }}" class="btn btn-outline-primary border-2 py-3 px-5">View All Blog Posts</a>
        </div>
    </div>
</div>
