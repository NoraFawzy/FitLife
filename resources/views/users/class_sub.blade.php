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

<div class="container " style="margin-top:5rem; margin-bottom:10rem; ">
    <div class="row align-items-center">
        <!-- Class Image -->
        <div class="col-md-6" style="max-height:400px; max-width:500px; margin-right:50px;">
            <div class="class-thumb">
                @if($class->image)
                <img src="{{ asset('upload/' . $class->image) }}" class="img-fluid rounded shadow" alt="Class Image">
                @else
                <img src="{{ asset('images/default-class.jpg') }}" class="img-fluid rounded shadow" alt="Default Class Image">
                @endif
            </div>
        </div>

        <!-- Class Info -->
        <div class="col-md-6">
            <h1 class="display-4 mb-3" style="color:#E85C0D;" data-aos="fade-up">{{ $class->name }}</h1>
            <h4 class="mb-3" data-aos="fade-up" data-aos-delay="200">Trained by - <span class="text-primary">{{ $class->coach->name ?? 'No Coach Assigned' }}</span></h4>
            <h5 class="mb-3 text-danger" data-aos="fade-up" data-aos-delay="300">Price: EGP {{ $class->price }}</h5>
            <p class="lead" data-aos="fade-up" data-aos-delay="400">
                {{ $class->description }}
            </p>
            <p data-aos="fade-up" data-aos-delay="500"><strong>Date:</strong> {{ $class->date }}</p>

            <!-- Enroll Button -->
            <form action="{{ route('class.join', $class->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg" style="background-color: #f13a11;" 
                        onclick="return confirm('Are you sure you want to join this class?')">Join Now!</button>
            </form>

        </div>
    </div>
</div>

    </div>
    <script>
    function joinClass() {
        alert('Successfully Subscribed!');
        
        window.location.href = "{{ route('profile.show') }}"; 
    }
</script>
</section>

@endsection
