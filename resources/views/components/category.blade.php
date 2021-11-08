@props(['flightCategory'])
<div class="row">
    @forelse ($flightCategory as $flight)
    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <a href="{{ route('categoryflight', ['slug'=>$flight->category_name])}}" class="unit-1 text-center">
            <img src="{{asset('storage')}}/{{$flight->image}}" alt="Image" class="img-fluid">
            <div class="unit-1-text">
                <h3 class="unit-1-heading">{{$flight->category_name}}</h3>
            </div>
        </a>
    </div>
    @empty
    <h1>Category Not Found</h1>
    @endforelse

</div>