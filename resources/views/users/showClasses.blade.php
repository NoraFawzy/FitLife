@extends('layouts.app')

@section('content')
<div class="container " style="margin-top: 10rem; margin-bottom:10rem;">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/class/cardio-class.jpg') }}" alt="Cardio Class" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h1 class="display-4 mb-3" style="color:#E85C0D;">Cardio Training</h1>
            <h4 class="mb-3">Trained by - <span class="text-primary">Nora Fawzy</span></h4>
            <h5 class="mb-3 text-danger">Price: $200</h5>
            <p class="lead">
                Cardio training helps improve your cardiovascular health, increase stamina, and burn calories. Join our expert trainer, Nora Fawzy, for an intense and fun workout that suits all fitness levels.
            </p>
            <a href="{{ url('/classes') }}" class="btn btn-primary btn-lg mt-4" style="background-color: #f13a11;">Join Now!</a>
        </div>
    </div>
</div>
@endsection

