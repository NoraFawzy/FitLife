@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .btnn {
            color: #fff;
            background-color: #f13a11;
            width: 100px;
            padding: 5px;
            border-radius: 10px;
        }

        .btnn:hover {
            color: #fff;
            /* Text color on hover */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-6">
                <h1 class="text-center mb-4" style="color:#f13a11;">Add Class</h1>
                <form method="POST" action="{{ route('classes.store') }}" enctype="multipart/form-data">
                    @csrf <!-- CSRF Token -->

                    <div class="form-group mb-3">
                        <label for="name">Class Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Class Name" required value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Class Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Class Description" required style="height: 150px;">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Class Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Price" required value="{{ old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="date">Class Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required value="{{ old('date') }}" min="{{ date('Y-m-d') }}">
                        @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Start Time Field -->
                    <div class="form-group mb-3">
                        <label for="start_time">Start Time</label>
                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" required value="{{ old('start_time') }}">
                        @error('start_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- End Time Field -->
                    <div class="form-group mb-3">
                        <label for="end_time">End Time</label>
                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" required value="{{ old('end_time') }}">
                        @error('end_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Class Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="coach_id">Assign Coach</label>
                        <select class="form-control @error('coach_id') is-invalid @enderror" id="coach_id" name="coach_id">
                            <option value="" disabled selected>Select a coach (optional)</option>
                            @foreach($coaches as $coach)
                            <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                            @endforeach
                        </select>
                        @error('coach_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btnn" name="send">Add Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('date');
            const startTimeInput = document.getElementById('start_time');
            const endTimeInput = document.getElementById('end_time');
            const today = new Date();

            dateInput.addEventListener('change', function () {
                const selectedDate = new Date(this.value);
                
                if (selectedDate.toDateString() === today.toDateString()) {
                    const currentTime = today.toISOString().substr(11, 5);
                    startTimeInput.min = currentTime;
                    endTimeInput.min = currentTime;
                } else {
                    startTimeInput.min = '';
                    endTimeInput.min = '';
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
