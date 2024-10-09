@extends('layouts.app')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body class="mt-5 pt-5">

<h1 class="text-center mt-3 display-4" style="color:#E85C0D;">
    Users List
</h1>

<div class="container mt-3">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- زر إضافة مستخدم جديد -->
    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-success btn-lg">+ Add New User</a>
    </div>

    <!-- حقل البحث -->
    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control form-control-lg" placeholder="Search by email..." value="{{ request()->query('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-primary btn-lg" type="submit">Search</button>
            </div>
        </div>
    </form>

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
                <td>{{ $user->email }}</td> <!-- عرض الإيميل -->
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

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
