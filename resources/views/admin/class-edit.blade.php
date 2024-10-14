@extends('layouts.app')
<style>
        .btnn {
            color: #fff;
            background-color: #f13a11;
            width: 150px;
            padding: 5px;
            border-radius: 10px;
        }

        .btnn:hover {
            color: #fff;
        }
    </style>

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
                        <input type="date" class="form-control" id="date" name="date" value="{{ $class->date }}" required>
                    </div>

                    <div class="form-group mb-3">
    <label for="coach_id">Assign Coach</label>
    <select class="form-control @error('coach_id') is-invalid @enderror" id="coach_id" name="coach_id">
        <option value="" {{ is_null($class->coach_id) ? 'selected' : '' }}>Select a coach (optional)</option>
        @foreach($coaches as $coach)
            <option value="{{ $coach->id }}" {{ $class->coach_id == $coach->id ? 'selected' : '' }}>
                {{ $coach->name }}
            </option>
        @endforeach
    </select>
    @error('coach_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                    <div class="form-group mb-3">
                        <label for="image">Class Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Display current image if it exists -->
                    @if ($class->image)
                        <div class="form-group mb-3">
                            <label>Current Image</label>
                            <img src="{{ asset('upload/' . $class->image) }}" alt="Class Image" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btnn" name="send">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
