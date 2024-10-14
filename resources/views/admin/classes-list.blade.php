@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="mt-5 pt-5">

    <h1 class="text-center mt-5 display-4" style="color:#E85C0D;">
        Classes List
    </h1>

    <div class="container mt-3">
        <div class="mb-3">
            <a href="{{route('classes.create')}}" class="btn btn-success">Add New Class</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="text-light" style="background-color: #E85C0D;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Coach</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classesx as $class)
                <tr>
                    <th scope="row">{{ $class->id }}</th>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->description }}</td>
                    <td>${{ $class->price }}</td>
                    <td>{{ $class->date}}</td>
                    <td>
    @if ($class->image)
        <img src="{{ asset('upload/' . $class->image) }}" alt="class img" style="max-width: 100px;">
    @else
        No image available
    @endif
</td>                <td>
    @if ($class->coach)
        {{ $class->coach->name }}
    @else
        No coach assigned
    @endif
</td>
                        <td>
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-primary btn-sm">Update</a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
