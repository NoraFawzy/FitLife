@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mp-5">
            <div class="col-md-6">
                <h1 class="text-center mb-4" style="color:#f40101;">Edit Class</h1>
                <form method="POST" action="{{ route('classes.update', $class->id) }}" enctype="multipart/form-data">
                    @csrf <!-- CSRF token -->
                    @method('PUT') <!-- Specify the method as PUT -->

                    <div class="form-group mb-3">
                        <label for="name">Class Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $class->name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Class Description</label>
                        <textarea class="form-control" id="description" name="description" required style="height: 150px;">{{ $class->description }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Class Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $class->price }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="date">Class Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $class->date}}" required>
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
