<div>
    <x-slot name="title">Registration</x-slot>
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light">Get In Touch</h1>
                    <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span
                            class="text-white">Login</span></div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center my-3">Login From</h1>

        <div class="row">
            <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-12 mb-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='login'>
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
                            <label class="text-black" for="password">Password</label>
                            <input type="password" wire:model='password' id="password" class="form-control">
                            <span class="text-danger">@error('password')
                                {{$message}}
                            @enderror</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary py-2 px-4 text-white">Signin</button>
                        <a href="{{ route('registration') }}" class="btn btn-success py-2 px-4 text-white">Signup</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>