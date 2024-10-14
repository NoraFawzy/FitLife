@extends('layouts.app')

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
        }
</style>
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mp-5">
            <div class="col-md-6">
                <h1 class="text-center text mb-4" style="color:#f13a11;">Add Subscription Plan</h1>
                <form method="POST" action="{{ route('plans.store') }}" enctype="multipart/form-data">
                    @csrf <!-- CSRF token -->

                    <div class="form-group mb-3">
                        <label for="name">Plan Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Plan Name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="sub_title">Plan Subtitle</label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Plan Subtitle" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="desc">Plan Description</label>
                        <textarea class="form-control" id="desc" name="desc" placeholder="Plan Description" required style="height: 150px;"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Plan Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="duration">Plan Duration (in months)</label>
                        <input type="number" class="form-control" id="duration" name="duration" placeholder="Duration" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btnn" name="send">Add Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
