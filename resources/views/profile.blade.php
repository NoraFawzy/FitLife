@extends('layouts.app')


    </style>

<div class="container mt-5 d-flex justify-content-center">
        <div class="card" style="width: 400px; margin-top: 10%; margin-bottom: 5%;">
            <div class="card-body "> <!-- Center text in card body -->
                <h3 class="card-title text-center">User Profile</h3>
                <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p> <!-- Bold Name -->
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p> <!-- Bold Email -->
                <div class="d-flex justify-content-center"> <!-- Center the button -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>