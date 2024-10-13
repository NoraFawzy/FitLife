@extends('layouts.app')

@section('content')


<!-- Flash Messages -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- CLASS DETAILS -->
<section class="class section" id="class">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Title -->
            <div class="col-lg-12 col-12 text-center mb-5">
                <h6 data-aos="fade-up">Class Details</h6>
                <h2 data-aos="fade-up" data-aos-delay="200">{{ $class->name }}</h2>
            </div>

            <!-- Class Info -->
            <div class="col-lg-6 col-md-8 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                <div class="class-thumb">
                    @if($class->image)
                    <img src="{{ asset('upload/' . $class->image) }}" class="img-fluid" alt="Class Image">
                    @else
                    <img src="{{ asset('images/default-class.jpg') }}" class="img-fluid" alt="Default Class Image">
                    @endif
                </div>

                <div class="class-info mt-4">
                    <h3>Trained by: {{ $class->coach->name ?? 'No Coach Assigned' }}</h3>
                    <span class="class-price">${{ $class->price }}</span>
                    <p class="mt-3">{{ $class->description }}</p>
                    <p><strong>Date:</strong> {{ $class->date }}</p>

                    <!-- Enroll Button -->
                    <form action="{{ route('user_classes.store') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                        <button type="submit" class="btn custom-btn">Enroll Now</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>

@endsection
