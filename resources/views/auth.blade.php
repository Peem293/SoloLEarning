<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo eLearning</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-style.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    @include('fragment.alert')
    <a href="" class="submit-btn back">Back</a>
    <div class="form-container sign-in-form">
        <div class="form-box sign-in-box">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" placeholder="Email ID" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input type="password" class="password-input" placeholder="Password" name="password" required>
                    <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                </div>
                <div class="forget-link">
                    <a href="">Forget password?</a>
                </div>
                <input type="submit" class="submit-btn" value="Login">
            </form>
            <div class="login-options">
                <p class="text">Or, login with...</p>
                <div class="other-logins">
                    <a href=""><img src="{{ asset('assets/images/google-logo.png')}}" alt=""></a>
                    <a href=""><img src="{{ asset('assets/images/facebook-logo.png')}}" alt=""></a>
                    <a href=""><img src="{{ asset('assets/images/apple-logo.png')}}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="imgBox sign-in-imgBox">
            <div class="sliding-link">
                <p>Don't have an account?</p>
                <span class="sign-up-btn">Sign up</span>
            </div>
            <img src="{{asset('assets/img/signup-img.png')}}" alt="">
        </div>
    </div>

    <div class="form-container sign-up-form">
        <div class="imgBox sign-up-imgBox">
            <div class="sliding-link">
                <p>Already a member?</p>
                <span class="sign-in-btn">Sign in</span>
            </div>
            <img src="{{asset('assets/img/signin-img.jpg')}}" alt="">
        </div>
        <div class="form-box sign-up-box">
            <h2>Sign up</h2>
            <div class="login-options">
                <div class="other-logins">
                    <a href=""><img src="{{ asset('assets/images/google-logo.png')}}" alt=""></a>
                    <a href=""><img src="{{ asset('assets/images/facebook-logo.png')}}" alt=""></a>
                    <a href=""><img src="{{ asset('assets/images/apple-logo.png')}}" alt=""></a>
                </div>
                <p class="text">Or, sign up with email...</p>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="field">
                    <i class="uil-selfie"></i>
                    <input type="text" placeholder="Employee" name="employee" required>
                </div>
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" placeholder="Email ID" name="email" required>
                </div>
                <div class="field">
                    <i class="uil uil-user"></i>
                    <input type="text" placeholder="Full name" name="name" required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-access"></i>
                    <input type="password" placeholder="Confirm password" required>
                </div>
                <input type="submit" class="submit-btn" value="Sign up">
            </form>
        </div>
    </div>

    <script src="assets/js/script-login.js"></script>
</body>

</html>