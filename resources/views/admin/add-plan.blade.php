@extends('layouts.app') 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subscription Plan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> 


    <style>
        .btn{
            color:#fff;
            background-color: #f13a11;
        }
        .btn:hover{
            color: #fff; /* Text color on hover */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center mp-5">
            <div class="col-md-6">
                <h1 class="text-center text mb-4" style="color:#f13a11;">Add Subscription Plan</h1>
                <form method="POST" enctype="multipart/form-data">
                    @csrf <!-- تأكد من تضمين رمز الحماية CSRF -->

                    <div class="form-group mb-3">
                        <label for="title">Plan Name</label>
                        <input type="text" class="form-control" id="title" name="plan_name" placeholder="Plan Name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="content">Plan Description</label>
                        <textarea class="form-control" id="content" name="plan_description" placeholder="Plan Description" required style="height: 150px;"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Plan Price</label>
                        <input type="number" class="form-control" id="price" name="plan_price" placeholder="Price" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="duration">Class Duration (in days)</label>
                        <input type="number" class="form-control" id="duration" name="class_duration" placeholder="Duration" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn" name="send">Add Plan</button>
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
