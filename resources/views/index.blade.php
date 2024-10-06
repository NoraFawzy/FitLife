@extends('layouts.app')

@section('content')



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
                    <p data-aos="fade-up" data-aos-delay="400">You are NOT allowed to redistribute this HTML template downloadable ZIP file on any template collection site. You are allowed to use this template for your personal or business websites.</p>
                    <p data-aos="fade-up" data-aos-delay="500">If you have any question regarding <a rel="nofollow" href="https://www.tooplate.com/view/2119-gymso-fitness" target="_parent">Gymso Fitness HTML template</a>, you can <a rel="nofollow" href="https://www.tooplate.com/contact" target="_parent">contact Tooplate</a> immediately. Thank you.</p>
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

                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <a href="#" class="class-card-link">
                        <div class="class-thumb">
                            <img src="{{ asset('images/class/yoga-class.jpg') }}" class="img-fluid" alt="Class">
                            <div class="class-info">
                                <h3 class="mb-1">Yoga</h3>
                                <span><strong>Trained by</strong> - Bella</span>
                                <span class="class-price">$50</span>
                                <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                    <a href="#" class="class-card-link">
                        <div class="class-thumb">
                            <img src="{{ asset('images/class/crossfit-class.jpg') }}" class="img-fluid" alt="Class">
                            <div class="class-info">
                                <h3 class="mb-1">Areobic</h3>
                                <span><strong>Trained by</strong> - Mary</span>
                                <span class="class-price">$66</span>
                                <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                    <a href="#" class="class-card-link">
                        <div class="class-thumb">
                            <img src="{{ asset('images/class/cardio-class.jpg') }}" class="img-fluid" alt="Class">
                            <div class="class-info">
                                <h3 class="mb-1">Cardio</h3>
                                <span><strong>Trained by</strong> - Cathe</span>
                                <span class="class-price">$75</span>
                                <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHEDULE -->
    <section class="schedule section" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h6 data-aos="fade-up">our weekly GYM schedules</h6>
                    <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">Workout Timetable</h2>
                </div>

                <div class="col-lg-12 py-5 col-md-12 col-12">
                    <table class="table table-bordered table-responsive schedule-table" data-aos="fade-up" data-aos-delay="300">
                        <thead class="thead-light">
                            <th><i class="fa fa-calendar"></i></th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td><small>7:00 am</small></td>
                                <td><strong>Cardio</strong><span>7:00 am - 9:00 am</span></td>
                                <td><strong>Power Fitness</strong><span>7:00 am - 9:00 am</span></td>
                                <td></td>
                                <td></td>
                                <td><strong>Yoga Section</strong><span>7:00 am - 9:00 am</span></td>
                            </tr>
                            <tr>
                                <td><small>9:00 am</small></td>
                                <td></td>
                                <td></td>
                                <td><strong>Boxing</strong><span>8:00 am - 9:00 am</span></td>
                                <td><strong>Areobic</strong><span>8:00 am - 9:00 am</span></td>
                                <td></td>
                                <td><strong>Cardio</strong><span>8:00 am - 9:00 am</span></td>
                            </tr>
                            <tr>
                                <td><small>11:00 am</small></td>
                                <td></td>
                                <td><strong>Boxing</strong><span>11:00 am - 2:00 pm</span></td>
                                <td><strong>Areobic</strong><span>11:30 am - 3:30 pm</span></td>
                                <td></td>
                                <td><strong>Body work</strong><span>11:50 am - 5:20 pm</span></td>
                            </tr>
                            <tr>
                                <td><small>2:00 pm</small></td>
                                <td><strong>Boxing</strong><span>2:00 pm - 4:00 pm</span></td>
                                <td><strong>Power lifting</strong><span>3:00 pm - 6:00 pm</span></td>
                                <td></td>
                                <td><strong>Cardio</strong><span>6:00 pm - 9:00 pm</span></td>
                                <td></td>
                                <td><strong>Crossfit</strong><span>5:00 pm - 7:00 pm</span></td>
                            </tr>
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
                    <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                        <input type="text" class="form-control" name="cf-name" placeholder="Name">
                        <input type="email" class="form-control" name="cf-email" placeholder="Email">
                        <textarea class="form-control" rows="5" name="cf-message" placeholder="Message"></textarea>
                        <button type="submit" class="form-control" id="submit-button" name="submit">Send Message</button>
                    </form>
                </div>

                <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Where you can <span>find us</span></h2>
                    <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i> Cairo - Helwan, Egypt</p>
                </div>
            </div>
        </div>
    </section>

@endsection
