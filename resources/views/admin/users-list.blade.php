@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color:#E85C0D; padding-top:35px;">Users List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex align-items-center mb-4">
            <!-- Search Field -->
            <form action="{{ route('users.index') }}" method="GET" class="form-inline">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by email..." value="{{ request()->query('search') }}" style="width: 300px;">
                <button class="btn btn-outline-primary btn-sm ml-2" type="submit">Search</button>
            </form>
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm ml-auto">+ Add New User</a> 
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="text-light" style="background-color: #E85C0D;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subscribed to</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->gender ?? 'N/A' }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->plan->name ?? 'N/A' }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Update</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection