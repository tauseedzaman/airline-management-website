<div>
    <x-slot name="title">Registration</x-slot>
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light">Get In Touch</h1>
                    <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span
                            class="text-white">Contact</span></div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center my-3">Registration From</h1>

        <div class="row">
            <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-12 mb-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='store'>
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">First Name</label>
                            <input type="text" name="fname" wire:model='fname' id="fname" class="form-control">
                            <span class="text-danger">@error('fname')
                                {{$message}}
                                @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Last Name</label>
                            <input type="text" wire:model='lname' id="lname" class="form-control">
                            <span class="text-danger">@error('lname')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="username">Username</label>
                            <input type="text" wire:model='username' id="username" class="form-control">
                            <span class="text-danger">@error('username')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" wire:model='email' id="email" class="form-control">
                            <span class="text-danger">@error('email')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="phone">Phone</label>
                            <input type="number" wire:model='phone' id="phone" class="form-control">
                            <span class="text-danger">@error('phone')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="address">Address</label>
                            <input type="address" wire:model='address' id="address" class="form-control">
                            <span class="text-danger">@error('address')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="password">Password</label>
                            <input type="password" wire:model='password' id="password" class="form-control">
                            <span class="text-danger">@error('password')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="file">Image</label>
                            <input type="file" wire:model='file' id="file" class="form-control">
                            @if ($file )
                            <img src="{{$file->temporaryUrl()}}" style="width: 70px;height:70px;" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary py-2 px-4 text-white">Signup</button>
                        <a href="{{ route('login') }}" class="btn btn-success py-2 px-4 text-white">Signin</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>