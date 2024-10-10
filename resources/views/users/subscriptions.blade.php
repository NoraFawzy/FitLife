@extends('layouts.app')

@section('content')
    <section class="pricing-section">
        <div class="container my-5">
            <h1 class="text-center mt-5 display-4 py-5" style="color:#f13a11;">
                Subscription Plans
            </h1>

            <div class="row d-flex align-items-stretch">
                @if($plans->isEmpty())
                    <div class="col-12 text-center">
                        <div class="alert alert-warning" role="alert">
                            No plans available at the moment.
                            @auth
                                @if(auth()->user()->role == 'admin')
                                    <a href="{{ route('plans.create') }}" class="btn btn-danger btn-lg" style="padding: 8px 16px; font-size: .9rem;">
                                        Create New Plan
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                @else
                    @foreach($plans as $plan)
                        <div class="col-md-4">
                            <div class="price-card d-flex flex-column">
                                <h2>{{ $plan->name }}</h2>
                                <p>{{ $plan->sub_title }}</p>
                                <p class="price">
                                    <span>{{ $plan->price }}</span> /
                                    {{ $plan->duration }} {{ $plan->duration == 1 ? 'Month' : 'Months' }}
                                </p>
                                <ul class="pricing-offers">
                                    @foreach(explode(',', $plan->desc) as $item)
                                        <li>{{ trim($item) }}</li>
                                    @endforeach
                                </ul>

                                @auth
                                    <a href="#" class="btn btn-mid mt-auto" style="font-size:.9rem">Subscribe</a>
                                @else
                                    <a href="/loginn" class="btn btn-mid mt-auto" style="font-size:.9rem">Join Now</a>
                                @endauth

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
