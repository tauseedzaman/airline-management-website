@props(['flights'])
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our AiroPlane</h2>
            <p class="color-black-opacity-5">Choose Your AiroPlane</p>
        </div>
    </div>
    <div class="row">
        @forelse ($flights as $flight)
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-1-text">
                <a href="{{ route('flightdetail', ['slug'=>$flight->slug]) }}" class="unit-1 text-center" wire:click='incrementViewF({{$flight->id}})'>
                    <img src="{{ asset('storage') }}/{{$flight->image}}" alt="Image" class="img-fluid">
                    <div class="unit-1-text">
                        <strong class="text-primary mb-2 d-block">${{$flight->price}}</strong>
                        <h3 class="unit-1-heading">{{$flight->name}}</h3>
                    </div>
                </a>
            </div>
            </a>
        </div>
        @empty
        <h1>Record Not Found</h1>
        @endforelse

    </div>
</div>
