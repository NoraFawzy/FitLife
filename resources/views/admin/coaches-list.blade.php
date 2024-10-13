@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches List</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body class="mt-5 pt-5">

    <h1 class="text-center mt-3 display-4" style="color:#E85C0D;">
        Coaches List
    </h1>

    <div class="container mt-3">
        <a href="{{ route('create_coach') }}" class="btn btn-success mb-3">Add New Coach</a>
        <table class="table table-striped table-bordered">
            <thead class="text-light" style="background-color: #E85C0D;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coaches as $coach)
                    <tr>
                        <th scope="row">{{ $coach->id }}</th>
                        <td>{{ $coach->name }}</td>
                        <td>{{ $coach->experience }}</td>
                        <td>
                            <a href="{{ route('coaches.edit', $coach->id) }}" class="btn btn-primary btn-sm">Update</a>
                            <form action="{{ route('coaches.destroy', $coach->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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
