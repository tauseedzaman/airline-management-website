<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/all.css')}}">
    @livewireStyles
    <title>Admin || {{$title}}</title>
</head>

<body>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">FMS</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                    class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 ml-md-0">
                <h4 class="text-white"> </h4>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">hilalahmad</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="">Settings</a>
                        <a class="dropdown-item" href="">Update Profile</a>
                        <div class="dropdown-divider"></div>

                        <livewire:admin-auth.logout />
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @if (Auth::guard('admin')->user()->roll == 1)
                                
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="{{route('admin.category')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Category
                            </a>

                            <a class="nav-link" href="{{route('admin.post')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Posts
                            </a>

                            <a class="nav-link" href="{{route('admin.flightcategory')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Flight Category
                            </a>

                            <a class="nav-link" href="{{route('admin.flight')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Flights
                            </a>

                            <a class="nav-link" href="{{route('admin.admins')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admins
                            </a>

                            <a class="nav-link" href="{{route('admin.users')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users
                            </a>

                            <a class="nav-link" href="{{route('admin.booked')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Booked Flight
                            </a>

                            <a class="nav-link" href="{{route('admin.reviews')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Reviews Flight
                            </a>

                            <a class="nav-link" href="{{route('admin.comment')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Comment Post
                            </a>
                            @endif

                            @if (Auth::guard('admin')->user()->roll == 0)
                                
                            <a class="nav-link" href="{{route('normal.posts')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Posts
                            </a>

                            <a class="nav-link" href="{{route('normal.flight')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Flights
                            </a>

                            @endif
                            {{-- <a href="" class="nav-link"> --}}
                                @livewire('admin-auth.logout')
                            {{-- </a> --}}

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: {{Auth::guard('admin')->user()->roll == 1 ?'Admin' : 'Normal'}}
                        </div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    {{$slot}}
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        {{-- @yield('admin') --}}

        <script src="{{asset(" admin/js/jquery.js")}}"></script>
        <script src="{{asset(" admin/js/bootstrap.min.js")}}"></script>
        <script src="{{asset(" admin/js/scripts.js")}}"></script>
        <script src="{{asset(" admin/js/all.js")}}"></script>
        {{-- <script src="{{asset(" js/app.js")}}"></script> --}}
        @livewireScripts
    </body>

</html>