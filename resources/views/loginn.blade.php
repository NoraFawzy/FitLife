<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

                <!-- select gender -->
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>



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
                    <p>Have an account! <br>Please, Enter you E-mail and Password</p>
                    <button class="hidden" id="login">Log in</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>New Here!</h1>
                    <p>  Please, Register with your personal details to use all of the site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script></body>

</html>
