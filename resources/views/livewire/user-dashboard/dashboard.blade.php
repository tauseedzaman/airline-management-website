<div>
    <x-slot name="title">Dashboard</x-slot>

   
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-2 text-white">
            Hi, {{Auth::user()->username}} Welcome Back
        </h1>
        <div class="pages">
            <span>Home . </span>
            <span> Page . </span>
            <span> Dashboard</span>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-md-6 col-sm-12 my-2">
            <div class="my_card">
                <div class="icon color-blue">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="">
                    <h6>Total Booking</h6>
                    <h4>{{count($total_booking)}}</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-12 my-2">
            <div class="my_card">
                <div class="icon color-green">
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="">
                    <h6>Wishlist</h6>
                    <h4>3</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-12 my-2">
            <div class="my_card">
                <div class="icon color-info">
                    <i class="fal fa-plane"></i>
                </div>
                <div class="">
                    <h6>Total Travel</h6>
                    <h4>3</h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 col-sm-12 my-2">
            <div class="my_card">
                <div class="icon color-purple">
                    <i class="fas fa-star"></i>
                </div>
                <div class="">
                    <h6>Total Review</h6>
                    <h4>{{count($total_reviews)}}</h4>
                </div>
            </div>
        </div>
    </div>

</div>