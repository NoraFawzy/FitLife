@extends('layouts.app')


<style>
  .schedulee-table {
    display: table;
    border: 0;
    text-align: center;
  }

  .schedulee-table strong,
  .schedulee-table span {
    display: block;
    text-align: center;
  }

  .schedulee-table strong {
    color: var(--white-color);
  }

  .schedulee-table span {
    color: var(--gray-color);
  }

  .schedulee-table span,
  .schedulee-table small {
    font-size: var(--menu-font-size);
    text-transform: uppercase;
  }

  .schedulee-table small {
    position: relative;
    top: 10px;
  }

  .table .thead-light th,
  .schedulee-table tr td:first-child {
    border: 1px solid #212122;
  }

  .schedulee-table .thead-light th {
    border-bottom: 0;
    text-transform: uppercase;
  }

  .table-bordered td, 
  .table-bordered th {
    border: 1px solid #212122;
  }

  .table-bordered td {
    padding-bottom: 22px;
  }

  .table td, .table th {
    padding: 1rem;
  }

</style>
<div class="container" style="margin-top: 10%;">
    <div class="row justify-content-center"> <!-- Use Bootstrap row to align cards -->

        {{-- Show profile card for both admin and user --}}
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'user')
            <div class="col-lg-6 col-md-6 col-sm-12 mb-2"> <!-- Responsive column for the first card -->
                <div class="card" style="height: 300px;">
                    <div class="card-body text-center"> <!-- Center text in card body -->
                        <h3 class="card-title mt-3">Profile Data</h3>
                        <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p> <!-- Bold Name -->
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p> <!-- Bold Email -->
                        <div class="d-flex justify-content-center mt-5"> <!-- Center the button -->
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Show the rest of the page only for user --}}
        @if (Auth::user()->role === 'user')
        
   @if($user->is_subscribed && $plan) <!-- Check if the user is subscribed and if the plan exists -->
    <div class="col-lg-6 col-md-6 col-sm-12 mb-2"> <!-- Responsive column for the subscription card -->
        <div class="card" style="height: 300px;">
            <div class="card-body text-center"> <!-- Center text in card body -->
                <h3 class="card-title">My Subscription Plan</h3>
                <p class="card-text"><strong>Plan Name:</strong> <span id="plan-name">{{ $plan->name }}</span></p> <!-- Bold Plan Name -->
                <p class="card-text"><strong>Description:</strong> <span id="plan-desc">{{ $plan->desc }}</span></p> <!-- Bold Description -->
                <p class="card-text"><strong>Price:</strong> <span id="plan-price">{{ $plan->price }} EGP</span></p> <!-- Bold Price -->
                <p class="card-text"><strong>Start Date:</strong> <span id="start-date">{{ $user->updated_at->format('Y-m-d') }}</span></p> <!-- Bold Start Date -->
                <p class="card-text"><strong>Duration:</strong> <span id="plan-duration">{{ $plan->duration }} Months</span></p> <!-- Bold Plan Duration -->
            </div>
        </div>
    </div>
@else
    <p>No subscription plan available.</p> <!-- Optional: Handle case when no plan is found -->
@endif

            {{-- Rest of the user-specific content --}}
            
            <section class="schedulee section" id="schedule">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h6 data-aos="fade-up">Workout Timetable</h6>
                            <h2 class="text" data-aos="fade-up" data-aos-delay="200">My Classes</h2>
                        </div>

                        <div class="col-lg-12 py-5 col-md-12 col-12">
                            <table class="table table-bordered table-responsive schedulee-table" data-aos="fade-up" data-aos-delay="300">
                                <thead class="thead-light">
                                    <tr>
                                        <th><i class="fa fa-calendar"></i></th>
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
                                        <td><strong>Aerobic</strong><span>8:00 am - 9:00 am</span></td>
                                        <td></td>
                                        <td><strong>Cardio</strong><span>8:00 am - 9:00 am</span></td>
                                        <td><strong>Body work</strong><span>11:50 am - 5:20 pm</span></td>
                                    </tr>
                                    <tr>
                                        <td><small>11:00 am</small></td>
                                        <td></td>
                                        <td><strong>Boxing</strong><span>11:00 am - 2:00 pm</span></td>
                                        <td><strong>Aerobic</strong><span>11:30 am - 3:30 pm</span></td>
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
                                        <td><strong>Body work</strong><span>11:50 am - 5:20 pm</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        @endif

    </div> <!-- Close row -->
</div> <!-- Close container -->
