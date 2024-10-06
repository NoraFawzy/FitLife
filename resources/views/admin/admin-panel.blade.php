@extends('layouts.app') 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> 
    <style>
        .aa {
    color: #000 ;
}

.btn-outline {
    border-color: #f13a11 !important; /* Border color */
    color: #000 !important; /* Text color */
}

.btn-outline-success:hover {
    background-color: #000 !important; /* Background color on hover */
    color: #fff !important; /* Text color on hover */
}

    </style>
</head>

<body  class="mt-5 pt-5">
    <div class="d-flex justify-content-around mt-5 text-center">
        <div class="flex-shrink-0 p-3 bg-white ml-5 pl-5" style="width: 25%;">
            <p class="text-secondary d-flex align-items-center pb-3 mb-3 ml-3 color-black text-decoration-none border-bottom display-3">Admin Panel</p>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-block btn-outline rounded collapsed" data-bs-toggle="collapse" data-bs-target="#news-collapse">
                        Classes
                    </button>
                    <div class="collapse mt-2" id="news-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded aa">Add Classes</a></li>
                            <li><a href="#" class="link-dark rounded aa">View Classes</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <button class="btn btn-block btn-outline align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#instructors-collapse" aria-expanded="false">
                    Subscription plans
                    </button>
                    <div class="collapse mt-2" id="instructors-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded aa">Add Subscription plans</a></li>
                            <li><a href="#" class="link-dark rounded aa">View Subscription plans</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <a href="#" class="btn btn-block btn-outline align-items-center rounded collapsed ">
                        List Users</a>
                </li>

                <li class="mb-1">
                    <button class="btn btn-block btn-outline align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#courses-collapse" aria-expanded="false">
                        Coaches
                    </button>
                    <div class="collapse mt-2" id="courses-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded aa">Add Coaches</a></li>
                            <li><a href="#" class="link-dark rounded aa">View Coaches</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <a href="#" class="btn btn-block btn-outline align-items-center rounded collapsed">
                        List Messages</a>
                </li>
            </ul>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
