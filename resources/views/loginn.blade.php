<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="container" id="container">
        <!-- Registration Form -->
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="mar">Create Account</h1>
                <span class="mar2">Use your email for registration</span>
                
                <!-- Name -->
                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required>
                
                <!-- Email -->
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                
                <!-- Password -->
                <input type="password" placeholder="Password" name="password" required>
                
                <!-- Confirm Password -->
                <input type="password" placeholder="Confirm Password" name="password_confirmation" required>

                <!-- Register Button -->
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="mar">Log in</h1>
                <span class="mar2">Use your email and password</span>

                <!-- Email -->
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                <!-- Password -->
                <input type="password" placeholder="Password" name="password" required>

               

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forget Your Password?</a>
                @endif

                <!-- Log In Button -->
                <button type="submit">Log in</button>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="error-messages">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>

        <!-- Toggle Panel -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of the site features</p>
                    <button class="hidden" id="login">Log in</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of the site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
