@extends('layouts.app')

<style>
    .class-thumb {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }

    .class-thumb img {
        max-height: 200px;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .class-info {
        flex-grow: 1;
        text-align: center;
    }

    .class-info p {
        max-width: 80%; 
        margin: 0 auto; 
        font-size: 14px; 
    }

    .class-price {
        font-size: 16px; 
        color: #E85C0D; 
        font-weight: bold;
        margin-top: 10px;
        display: block;
    }

    .class-thumb:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>



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
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="{{ asset('upload/' . $class->image) }}" class="img-fluid" alt="{{ $class->name }}">
                        <div class="class-info">
                            <h3 class="mb-1">{{ $class->name }}</h3>
                            <span class='pe-5'><strong>Trained by</strong> <br>- {{ $class->coach->name ?? 'No coach assigned' }}</span>
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
