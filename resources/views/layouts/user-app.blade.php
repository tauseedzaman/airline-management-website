<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
    <title>User - {{$title}}</title>

    @livewireStyles
</head>

<body>
    <div class="my_row">
        <div class="left-side p-3" id="sidebar">
            <i class="fal fa-times-circle float-right" id="close"></i>
            <div class="container">
                <div class="user-profile d-flex align-items-center">
                    <div class="image-logo">
                        <img src="{{asset('storage')}}/{{Auth::user()->image}}" alt="">
                    </div>
                    <div class="user-profile-detail">
                        <h5>{{Auth::user()->fname}} {{Auth::user()->lname}}</h5>
                        <h6>{{Auth::user()->email}}</h6>
                    </div>
                </div>
                <hr>
                <a href="{{ route('user.dashboard') }}" class="nav-link d-flex align-items-center link mt-3 {{Request::routeIs('user.dashboard')?'active' : ''}}">
                    <i class="far mr-3 fa-tachometer-slow"></i> <span>Dashboard</span>
                </a>
                <a href="{{ route('user.booking') }}" class="nav-link d-flex align-items-center link mt-1 {{Request::routeIs('user.booking')?'active' : ''}}">
                    <i class="far mr-3 fa-tachometer-slow"></i> <span>My Booking</span>
                </a>
                <a href="mybooking.html" class="nav-link d-flex align-items-center link mt-1">
                    <i class="far mr-3 fa-tachometer-slow"></i> <span>My WishList</span>
                </a>
                <a href="{{ route('user.profile') }}" class="nav-link d-flex align-items-center link mt-1 {{Request::routeIs('user.profile')?'active' : ''}}">
                    <i class="far mr-3 fa-tachometer-slow"></i> <span>Profile</span>
                </a>
                <a href="{{ route('user.myreview') }}" class="nav-link d-flex align-items-center link mt-1 {{Request::routeIs('user.myreview')? 'active': ''}}">
                    <i class="fas mr-3 fa-star"></i> <span>My Reviews</span>
                </a>
                {{-- @livewire('user-auth.logout') --}}
                <a href="" class="nav-link d-flex align-items-center link mt-1">
                    <i class="fal mr-3 text-danger fa-times-circle"></i> <span>Logout</span>
                </a>
            </div>
        </div>
        <div class="right-side">
            <div class="container px-4">
                <nav class="d-flex justify-content-between align-items-center py-2">
                    <div class="logo">
                        <h4 class="text-white"><a href="/">Home</a></h4>
                    </div>
                    <div class="profile">
                        <i class="fas fa-bars" id="open"></i>
                        <img src="{{asset("storage")}}/{{Auth::user()->image}}" alt="">
                        <span class=" ml-3 text-white">{{Auth::user()->fname}} {{Auth::user()->lname}}</span>
                    </div>
                </nav>
                <hr>

                {{$slot}}
                <hr>
                <footer class="py-3 px-3">
                    <div>
                        <span>© Copyright Trizen 2020. Made with by Hilal Ahmad</span>
                    </div>
                    <div class="social-icon ">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-whatsapp"></i>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Popper JS -->
    {{-- <script src="{{ asset('js/proper.min.js') }}"></script> --}}

    <!-- Latest compiled JavaScript -->
    <script src={{ asset('js/bootstrap.min.js') }}></script>

    <script src="{{asset('js/app.js')}}"></script>

    @livewireScripts
</body>

</html>