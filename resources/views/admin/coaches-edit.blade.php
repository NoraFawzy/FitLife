@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mp-5">
            <div class="col-md-6">
                <h1 class="text-center text mb-4" style="color:#f40101;">Edit Coach</h1>
                <form method="POST" action="{{ route('coaches.update', $coach->id) }}" enctype="multipart/form-data">
                    @csrf <!-- CSRF token -->
                    @method('PUT') <!-- وضع الميثود كـ PUT -->

                    <div class="form-group mb-3">
                        <label for="name">Coach Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $coach->name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="experience">Coach Experience</label>
                        <textarea class="form-control" id="experience" name="experience" required style="height: 150px;">{{ $coach->experience }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn" name="send">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
