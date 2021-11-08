<div>
    <x-slot name="title">Contact</x-slot>
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

        <div class="site-section row bg-light">
            <div class="col-md-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='contactUs'>
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
                            <label class="text-black" for="email">Email</label>
                            <input type="text" wire:model='email' id="email" class="form-control">
                            <span class="text-danger">@error('email')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="website">Website(optional)</label>
                            <input type="email" wire:model='website' id="website" class="form-control">
                            <span class="text-danger">@error('website')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>



                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Message</label>
                            <textarea name="message" wire:model='message' id="message" cols="30" rows="10" class="form-control"></textarea>
                            <span class="text-danger">@error('message')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary py-2 px-4 text-white">Submit</button>
                    </div>

                </form>
            </div>
            <div class="col-md-5">
                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Address</p>
                    <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="#">youremail@domain.com</a></p>

                </div>

                <div class="p-4 mb-3 bg-white">
                    <img src="images/hero_bg_1.jpg" alt="Image" class="img-fluid mb-4 rounded">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto
                        hic
                        consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui,
                        libero
                        neque sed nulla.</p>
                    <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>