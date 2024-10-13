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
    <div class="row justify-content-center"> 

        {{-- Show profile card for both admin and user --}}
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'user')
            <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                <div class="card" style="height: 300px;">
                    <div class="card-body text-center"> 
                        <h3 class="card-title mt-3">Profile Data</h3>
                        <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p> 
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p> 
                        <div class="d-flex justify-content-center mt-5"> 
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Show the rest of the page only for user --}}
        @if (Auth::user()->role === 'user')
        
   @if($user->is_subscribed && $plan) 
    <div class="col-lg-6 col-md-6 col-sm-12 mb-2"> 
        <div class="card" style="height: 300px;">
            <div class="card-body text-center">
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
    <p>No subscription plan available.</p> 
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
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Day</th> 
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Coach</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->classes as $class)
                            <tr>
                                <td>{{ $class->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($class->date)->format('l') }}</td> <!-- استخراج اليوم -->
                                <td>{{ \Carbon\Carbon::parse($class->start_time)->format('h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($class->end_time)->format('h:i A') }}</td>
                                <td>{{ $class->coach->name ?? 'No Coach Assigned' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                        </div>
                    </div>
                </div>
            </section>

        @endif

    </div> <!-- Close row -->
</div> <!-- Close container -->
