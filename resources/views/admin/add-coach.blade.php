@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coach</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <style>
       .btnn {
            color: #fff;
            background-color: #f13a11;
            width: 100px;
            padding: 5px;
            border-radius: 10px;
        }

        .btnn:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center pt-4">
            <div class="col-md-6">
                <h1 class="text-center mb-4" style="color:#f13a11;">Add Coach</h1>
                <form method="POST" action="{{ route('coach.store') }}" enctype="multipart/form-data">
                    @csrf <!-- تأكد من تضمين رمز الحماية CSRF -->

                    <div class="form-group mb-3">
                        <label for="title">Coach Name</label>
                        <input type="text" class="form-control" id="title" name="name" placeholder="Coach Name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="content">Coach Experience</label>
                        <textarea class="form-control" id="content" name="experience" placeholder="Coach Experience" required style="height: 150px;"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btnn" name="send">Add Coach</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
