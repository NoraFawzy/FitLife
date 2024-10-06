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
<body  class="mt-5 pt-5">

    <h1 class="text-center mt-3 display-4" style="color:#E85C0D;">
        Users List
    </h1>

    <div class="container mt-3">
        <table class="table table-striped table-bordered">
            <thead class="text-light" style="background-color: #E85C0D;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Subscribed to</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>Male</td>
                    <td>Basic Plan</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        <a href="#" class="btn btn-primary btn-sm">Update</a>
                    </td>
                </tr>
                <!-- Repeat <tr> block for more rows -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
