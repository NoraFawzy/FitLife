@extends('layouts.app')

@section('content')

    <style>
        .custom-btnn {
            background-color: var(--primary-color);
            color: var(--white-color);
            padding: 10px 30px;    border-radius: 5px;
            text-decoration: none;
            margin-top: 2%;
            display: inline-block;
        }

        .custom-btnn:hover {
            color: var(--primary-color);
            background-color: var(--white-color); /* Change background color on hover, if desired */
        }
      
    .class-thumb {
        height: 200px; 
        overflow: hidden;
    }

    .class-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .class-info {
        height: 150px; 
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-lg-4, .col-md-6, .col-12 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>


    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">
        <video autoplay muted loop id="heroVideo" class="video-background">
            <source src="{{ asset('images/4920813-hd_1920_1080_25fps.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>

        <div class="bg-overlay"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">
                        <h6 data-aos="fade-up" data-aos-delay="300">new way to build a healthy lifestyle!</h6>
                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Upgrade your body at FitLife Hub</h1>
                        <a href="#class" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Get started</a>

                       <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row">
                <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hello, we are FitLife Hub</h2>
                    <p data-aos="fade-up" data-aos-delay="400"> We’re passionate about helping individuals achieve their fitness goals and lead healthier, more active lives. Whether you’re a beginner or a seasoned athlete, we provide a wealth of resources, expert tips, and personalized plans tailored to your needs. </p>
                    <p > Our platform is designed to inspire and empower you through a wide variety of sports, workouts, and wellness practices, all with the aim of creating a community focused on growth, performance, and well-being. Join us on the journey to a stronger, fitter you!</p>
                </div>

                <div class="col-lg-6 col-md-12 col-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="700">
                    <div class="custom-video-wrapper">
                        <video autoplay muted loop class="custom-video-background" alt="Trainer">
                            <source src="{{ asset('images/1596861-uhd_3840_2160_30fps.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="custom-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- CLASS -->
<section class="class section" id="class">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mb-5">
                <h6 data-aos="fade-up">Get A Perfect Body</h6>
                <h2 data-aos="fade-up" data-aos-delay="200">Our Training Classes</h2>
            </div>

            <!-- عرض فقط 3 بطاقات -->
            @foreach($classesx->take(3) as $class)
            <div class="col-lg-4 col-md-6 col-12 mb-5" data-aos="fade-up" data-aos-delay="400">
                <a href="{{route('class_sub' ,$class->id )}}" class="class-card-link">
                    <div class="class-thumb">
                        @if($class->image)
                        <img src="{{ asset('upload/' . $class->image) }}" class="img-fluid class-image" alt="Class Image - {{ $class->name }}">
                        @else
                        <img src="{{ asset('images/default-class.jpg') }}" class="img-fluid class-image" alt="Default Class Image">
                        @endif
                    </div>

                    <div class="class-info">
                        <h3 class="mb-1">{{ $class->name }}</h3>
                        <span class="class-price" style="margin-top: -5px; width:80px">{{ $class->price }} L.E.</span>
                        <h5>Trained by: {{ optional($class->coach)->name ?? 'No Coach Assigned' }}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div style="text-align: center;">
        <a href="{{ route('plans.index') }}" class="custom-btnn">
            Subscription Plans
        </a>
    </div>
</section>


    
        <section class="schedule section" id="schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h6 data-aos="fade-up">Our Weekly GYM Schedules</h6>
                <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">Workout Timetable</h2>
            </div>

            <div class="col-lg-12 py-5 col-md-12 col-12">
                <table class="table table-bordered table-responsive schedule-table" data-aos="fade-up" data-aos-delay="300">
                    <thead class="thead-light">
                        <tr>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                            <th>Sun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop over the fetched classes and display them in the table -->
                        @foreach($classesx as $class)
                            <tr>
                                <td>
                                    @if(\Carbon\Carbon::parse($class->date)->format('l') == 'Monday')
                                        <strong>{{ $class->name }}</strong>
                                        <span>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i a') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('h:i a') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(\Carbon\Carbon::parse($class->date)->format('l') == 'Tuesday')
                                        <strong>{{ $class->name }}</strong>
                                        <span>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i a') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('h:i a') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(\Carbon\Carbon::parse($class->date)->format('l') == 'Wednesday')
                                        <strong>{{ $class->name }}</strong>
                                        <span>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i a') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('h:i a') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(\Carbon\Carbon::parse($class->date)->format('l') == 'Thursday')
                                        <strong>{{ $class->name }}</strong>
                                        <span>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i a') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('h:i a') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(\Carbon\Carbon::parse($class->date)->format('l') == 'Friday')
                                        <strong>{{ $class->name }}</strong>
                                        <span>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i a') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('h:i a') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(\Carbon\Carbon::parse($class->date)->format('l') == 'Saturday')
                                        <strong>{{ $class->name }}</strong>
                                        <span>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i a') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('h:i a') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(\Carbon\Carbon::parse($class->date)->format('l') == 'Sunday')
                                        <strong>{{ $class->name }}</strong>
                                        <span>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i a') }} - {{ \Carbon\Carbon::parse($class->end_time)->format('h:i a') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



    <!-- CONTACT -->
    <section class="contact section" id="contact">
    <div class="container">
        <div class="row">
            <div class="ml-auto col-lg-5 col-md-6 col-12">
                <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Feel free to ask anything</h2>

                <!-- Contact Form -->
                <form action="{{ route('contact.store') }}" method="POST" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form" id="contact">
                    @csrf
                    <input type="text" class="form-control" name="cf-name" placeholder="Name" required>
                    <input type="email" class="form-control" name="cf-email" placeholder="Email" required>
                    <textarea class="form-control" rows="5" name="cf-message" placeholder="Message" required></textarea>
                    <button type="submit" class="form-control" id="submit-button" name="submit">Send Message</button>
                </form>
            </div>

            <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">We're happy   <p>to help you</p></h2>
              
            </div>
        </div>
    </div>
</section>


<script>
    function validateForm() {
        let name = document.getElementById('cf-name').value;
        let email = document.getElementById('cf-email').value;
        let message = document.getElementById('cf-message').value;
        if (!name || !email || !message) {
            alert("All fields must be filled out");
            return false;
        }
        return true;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection


