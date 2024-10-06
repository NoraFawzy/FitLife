@extends('layouts.app') 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> 
    
    <!-- Custom CSS -->

    <style>
        .btn{
            color:#fff ;
            background-color: #f13a11;
        }
        .btn:hover{
            color: #fff; /* Text color on hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-6">
                <h1 class="text-center text mb-4" style="color:#f13a11;">Add Class</h1>
                <form method="POST" enctype="multipart/form-data">
                    @csrf <!-- تأكد من تضمين رمز الحماية CSRF -->

                    <div class="form-group mb-3">
                        <label for="title">Class Name</label>
                        <input type="text" class="form-control" id="title" name="class_name" placeholder="Class Name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="content">Class Description</label>
                        <textarea class="form-control" id="content" name="class_description" placeholder="Class Description" required style="height: 150px;"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Class Image</label>
                        <input type="file" class="form-control" id="image" name="class_image" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Class Price</label>
                        <input type="number" class="form-control" id="price" name="class_price" placeholder="Price" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="date">Class Date</label>
                        <input type="date" class="form-control" id="date" name="class_date" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn" name="send" style={background-color: #f13a11;} >Add Class</button>
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
