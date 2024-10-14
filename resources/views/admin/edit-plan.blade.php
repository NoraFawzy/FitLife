@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mp-5">
            <div class="col-md-6">
                <h1 class="text-center text mb-4" style="color:#f40101;">Edit Subscription Plan</h1>
                <form method="POST" action="{{ route('plans.update', $plan->id) }}" enctype="multipart/form-data">
                    @csrf <!-- CSRF token -->
                    @method('PUT') 

                    <div class="form-group mb-3">
                        <label for="name">Plan Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $plan->name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="sub_title">Plan Subtitle</label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ $plan->sub_title }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="desc">Plan Description</label>
                        <textarea class="form-control" id="desc" name="desc" required style="height: 150px;">{{ $plan->desc }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Plan Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $plan->price }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="duration">Class Duration (in days)</label>
                        <input type="number" class="form-control" id="duration" name="duration" value="{{ $plan->duration }}" required>
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
