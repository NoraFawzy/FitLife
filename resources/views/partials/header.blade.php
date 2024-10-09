<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife Hub</title>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">FitLife Hub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a href="#home" class="nav-link smoothScroll">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link smoothScroll">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#class" class="nav-link smoothScroll">Classes</a>
                </li>
                <li class="nav-item">
                    <a href="#schedule" class="nav-link smoothScroll">Schedules</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link smoothScroll">Contact</a>
                </li>

                <li class="nav-item">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <li class="login-button d-flex align-items-center">
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('admin-panel')}}" class="nav-link smoothScroll" style="font-size: 14px;">Dashboard</a>
                                    @else
                                        <a href="{{ url('/profile') }}" class="nav-link smoothScroll" style="font-size: 14px;">Profile</a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="{{ route('logout') }}" class="nav-link smoothScroll ms-2"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       style="margin-left: 10px;">
                                        Logout
                                    </a>
                                </li>
                            @else
                                <li class="login-button">
                                    <a href="/loginn" class="nav-link smoothScroll">Login</a>
                                </li>
                            @endauth
                        </div>
                    @endif
                </li>

            </ul>
        </div>
    </div>
</nav>

</body>
</html>
