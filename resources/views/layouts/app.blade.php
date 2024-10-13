<!DOCTYPE html>
<html lang="en">
<head>
    <title>FitLife Hub</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscriptions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tooplate-gymso-style.css') }}">
    
</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- Include Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Include Footer -->
    @include('partials.footer')
    
    @include('sweetalert::alert')


    <!-- SCRIPTS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/smoothscroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>