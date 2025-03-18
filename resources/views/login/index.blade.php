<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{ $title }}</title>
    @include('layouts.head')
    @include('layouts.head-style') 

</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<body class="h-full">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show max-w-md" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
       <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0 vh-100 align-items-center justify-content-center">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex align-items-center justify-content-center min-vh-100 p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-3 text-center">
                                    <a href="/" class="d-block auth-logo">
                                        <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="" height="28">
                                        <span class="logo-txt">Minia</span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Welcome Back!</h5>
                                        <p class="text-muted mt-2">Sign in to your account</p>
                                    </div>
                                    <form class="custom-form pt-2" action="/signin" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="login">Username or Telegram Username</label>
                                            <input type="text" name="login" id="login" class="form-control @error('login') is-invalid @enderror" placeholder="Enter username or Telegram" value="{{ old('login') }}" required autofocus>
                                            @error('login')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" required>
                                                <button class="btn btn-light ms-0" type="button" id="togglePassword"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="captcha">Captcha</label>
                                            <div class="d-flex align-items-center">
                                                <img id="captcha-img" src="{{ captcha_src('mini') }}" alt="captcha">
                                                <button type="button" id="refresh-captcha" class="btn btn-link p-0 ms-2">🔄</button>
                                            </div>
                                            <input type="text" name="captcha" id="captcha" class="form-control mt-2 @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" required>
                                            @error('captcha')
                                                <span class="text-danger">Invalid Captcha</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" style="background-color: #023669 !important; border-color: #023669 !important;">Sign In</button>
                                        </div>
                                    </form>
                                    <div class=" text-center">
                                        <p class="text-muted mb-0">Don't have an account? <a href="/signup" class="text-primary fw-semibold" style="color: #023669 !important;">Sign up now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            let passwordInput = document.getElementById('password');
            let eyeIcon = document.getElementById('togglePassword').querySelector('i');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("mdi-eye-outline");
                eyeIcon.classList.add("mdi-eye-off-outline");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("mdi-eye-off-outline");
                eyeIcon.classList.add("mdi-eye-outline");
            }
        });

        document.getElementById('refresh-captcha').addEventListener('click', function () {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('captcha-img').src = data.captcha + '?t=' + new Date().getTime();
                })
                .catch(error => console.error('Error refreshing captcha:', error));
        });
    </script>
</body>
</html>    