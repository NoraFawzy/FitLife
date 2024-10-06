@extends('layouts.app')


<!-- CLASS -->
<section class="class section" id="class">
    <div class="container">
        <div class="row">

            <!-- Title -->
            <div class="col-lg-12 col-12 text-center mb-5">
                <h6 data-aos="fade-up">Get A Perfect Body</h6>
                <h2 data-aos="fade-up" data-aos-delay="200">Our Training Classes</h2>
            </div>

            <!-- Cards -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                <div class="class-thumb">
                    <img src="{{ asset('images/class/yoga-class.jpg') }}" class="img-fluid" alt="Class">
                    <div class="class-info">
                        <h3 class="mb-1">Yoga</h3>
                        <span><strong>Trained by</strong> - Bella</span>
                        <span class="class-price">$50</span>
                        <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="500">
                <div class="class-thumb">
                    <img src="{{ asset('images/class/crossfit-class.jpg') }}" class="img-fluid" alt="Class">
                    <div class="class-info">
                        <h3 class="mb-1">Aerobic</h3>
                        <span><strong>Trained by</strong> - Mary</span>
                        <span class="class-price">$66</span>
                        <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="600">
                <div class="class-thumb">
                    <img src="{{ asset('images/class/cardio-class.jpg') }}" class="img-fluid" alt="Class">
                    <div class="class-info">
                        <h3 class="mb-1">Cardio</h3>
                        <span><strong>Trained by</strong> - Cathe</span>
                        <span class="class-price">$75</span>
                        <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<hr>

<!-- Coaches -->
<section class="class section" id="class">
    <div class="container">
        <div class="row">

            <!-- Title -->
            <div class="col-lg-12 col-12 text-center mb-5">
                <h6 data-aos="fade-up">Meet Our Team</h6>
                <h2 data-aos="fade-up" data-aos-delay="200">Our Coaches</h2>
            </div>

            <!-- Cards -->
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                <div class="class-thumb">
                    <img src="{{ asset('images/class/yoga-class.jpg') }}" class="img-fluid" alt="Coach">
                    <div class="class-info">
                        <h3 class="mb-1">Anne</h3>
                        <p class="mt-3">experience level</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="500">
                <div class="class-thumb">
                    <img src="{{ asset('images/class/crossfit-class.jpg') }}" class="img-fluid" alt="Coach">
                    <div class="class-info">
                        <h3 class="mb-1">Anne</h3>
                        <p class="mt-3">experience level</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="600">
                <div class="class-thumb">
                    <img src="{{ asset('images/class/cardio-class.jpg') }}" class="img-fluid" alt="Coach">
                    <div class="class-info">
                        <h3 class="mb-1">Anne</h3>
                        <p class="mt-3">experience level</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

