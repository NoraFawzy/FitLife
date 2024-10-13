@extends('layouts.app')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plans List</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body class="mt-5 pt-5">

<h1 class="text-center mt-3 display-4" style="color:#E85C0D;">
    Plans List
</h1>

<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="text-light" style="background-color: #E85C0D;">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Duration</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($plans as $plan)
            <tr>
                <th scope="row">{{ $plan->id }}</th>
                <td>{{ $plan->name }}</td>
                <td>{{ explode('.', $plan->desc)[0] }}.</td> <!-- عرض أول جملة فقط من الوصف -->
                <td>{{ $plan->price }} EGP</td>
                <td>{{ $plan->duration }}</td>
                <td>
                    <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-primary btn-sm">Update</a>

                    <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this plan?');">
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
