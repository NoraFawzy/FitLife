@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* General Panel Styles */
        .admin-panel {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 30px;
            width: 50%; /* تغيير العرض إلى 50% */
        }

        /* Admin Panel Title */
        .admin-title {
            color: #f13a11;
            font-size: 2.5rem;
            font-weight: bold;
        }

        /* Panel Buttons */
        .btn-outline {
            border: 2px solid #f13a11;
            color: #f13a11;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-outline:hover {
            background-color: #f13a11;
            color: #fff;
        }

        .btn-outline i {
            margin-right: 10px;
        }

        /* List Styles */
        .list-unstyled {
            margin-top: 20px;
        }

        /* Button Spacing */
        .btn {
            margin-bottom: 15px;
        }

        /* Background for hover effect */
        .list-unstyled a {
            background-color: #fff;
            padding: 10px;
            display: block;
            border-radius: 6px;
            margin-bottom: 5px;
            transition: background-color 0.3s;
        }

        .list-unstyled a:hover {
            background-color: #f8f9fa;
            text-decoration: none;
        }

        /* Collapse menu animation */
        .collapse {
            transition: height 0.4s ease;
        }

        /* Additional Padding */
        .admin-container {
            margin-top: 80px;
        }

    </style>
</head>

<body class="mt-5 pt-5">
    <div class="container admin-container">
        <div class="d-flex justify-content-center"> <!-- تعديل العرض ليكون في الوسط -->
            <div class="admin-panel">
                <p class="text-center admin-title">Admin Panel</p>
                <ul class="list-unstyled">
                    <!-- Classes Section -->
                    <li class="mb-1">
                        <button class="btn btn-block btn-outline" data-bs-toggle="collapse" data-bs-target="#news-collapse">
                            <i class="fas fa-chalkboard-teacher"></i> Classes
                        </button>
                        <div class="collapse mt-2" id="news-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="{{route('classes.create')}}" class="aa"><i class="fas fa-plus"></i> Add Classes</a></li>
                                <li><a href="{{ route('classes.index') }}" class="aa"><i class="fas fa-eye"></i> View Classes</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Subscription plans Section -->
                    <li class="mb-1">
                        <button class="btn btn-block btn-outline" data-bs-toggle="collapse" data-bs-target="#plans-collapse" aria-expanded="false">
                            <i class="fas fa-clipboard-list"></i> Subscription Plans
                        </button>
                        <div class="collapse mt-2" id="plans-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('plans.create') }}" class="aa"><i class="fas fa-plus"></i> Add Plans</a></li>
                                <li><a href="{{ route('plans.indexx') }}" class="aa"><i class="fas fa-eye"></i> View Plans</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Coaches Section -->
                    <li class="mb-1">
                        <button class="btn btn-block btn-outline" data-bs-toggle="collapse" data-bs-target="#coaches-collapse" aria-expanded="false">
                            <i class="fas fa-user-tie"></i> Coaches
                        </button>
                        <div class="collapse mt-2" id="coaches-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="{{ route('create_coach') }}" class="aa"><i class="fas fa-plus"></i> Add Coaches</a></li>
                                <li><a href="{{route('admin.coaches-list')}}" class="aa"><i class="fas fa-eye"></i> View Coaches</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Users Section -->
                    <li class="mb-1">
                        <a href="{{ route('users-list') }}" class="btn btn-block btn-outline">
                            <i class="fas fa-users"></i> List Users
                        </a>
                    </li>

                    <!-- Messages Section -->
                    <li class="mb-1">
                        <a href="{{route('contacts')}}" class="btn btn-block btn-outline">
                            <i class="fas fa-envelope"></i> List Messages
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
