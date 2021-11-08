<div>
    <x-slot name="title">Home</x-slot>
    <x-slider :sliderPost="$sliderPost" />
    <div class="site-section">
        <div class="container overlap-section">
              <x-category :flightCategory="$flightCategory" />
        </div>
    </div>
    <div class="site-section block-13 bg-light">
      <x-testimonial />
    </div>
    <div class="site-section">
    <x-flights :flights="$flights" />
    </div>
    <div class="site-blocks-cover overlay inner-page-cover"
        style="background-image: url(images/hero_bg_2.jpg); background-attachment: fixed;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
                    <a href="https://vimeo.com/channels/staffpicks/93951774"
                        class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
                    <h2 class="text-white font-weight-light mb-5 h1">Experience Our Outstanding Services</h2>

                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-light">
        <x-services />
    </div>
    <div class="site-section">
       <x-blog :posts="$posts" />
    </div>
    <div class="site-section border-top">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-5 text-black">Want To Travel With Us?</h2>
                    <p class="mb-0"><a href="booking.html" class="btn btn-primary py-3 px-5 text-white">Book Now</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
