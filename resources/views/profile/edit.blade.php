@extends('layouts.app')

@section('content')
<body>
    <div class="container" style="margin-top: 5%;">
        <h3 class="text-center mb-4">Edit Profile</h3> <!-- Center the title -->

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div> <!-- Bootstrap alert for status messages -->
        @endif

        <div class="card" >
            <div class="card-body" >
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3"> <!-- Margin bottom for spacing -->
                        <label for="name" class="form-label">Name</label> <!-- Bootstrap label -->
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required> <!-- Bootstrap input -->
                    </div>

                    <div class="mb-3"> <!-- Margin bottom for spacing -->
                        <label for="email" class="form-label">Email</label> <!-- Bootstrap label -->
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required> <!-- Bootstrap input -->
                    </div>

                    <div class="d-flex justify-content-center"> <!-- Center the button -->
                        <button type="submit" class="btn btn-primary">Update Profile</button> <!-- Bootstrap button -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
