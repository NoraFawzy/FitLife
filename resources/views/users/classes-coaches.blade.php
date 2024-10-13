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

            <!-- Loop through classes -->
            @foreach($classesx as $class)
                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="{{ asset('upload/' . $class->image) }}" class="img-fluid" alt="{{ $class->name }}">
                        <div class="class-info">
                            <h3 class="mb-1">{{ $class->name }}</h3>
                            <span><strong>Trained by</strong> - {{ $class->coach->name ?? 'No coach assigned' }}</span>
                            <span class="class-price">${{ $class->price }}</span>
                            <p class="mt-3">{{ $class->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<hr>

<!-- Coaches -->
<section class="class section" id="coaches">
    <div class="container">
        <div class="row">

            <!-- Title -->
            <div class="col-lg-12 col-12 text-center mb-5">
                <h6 data-aos="fade-up">Meet Our Team</h6>
                <h2 data-aos="fade-up" data-aos-delay="200">Our Coaches</h2>
            </div>

            <!-- Loop through coaches -->
            @foreach($coaches as $coach)
                <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="{{ asset('images/class/yoga-class.jpg') }}" class="img-fluid" alt="Coach">
                        <div class="class-info">
                            <h3 class="mb-1">{{ $coach->name }}</h3>
                            <p class="mt-3">{{ $coach->experience }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
