<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>
</head> --}}

<head>

    <title>{{ $title }}</title>
    @include('layouts.head')
    @include('layouts.head-style') 

</head>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('togglePassword').addEventListener('click', function () {
            let passwordInput = document.getElementById('password');
            let eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        });
    });
</script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<body class="h-full">  
    {{-- <div class="flex flex-col items-center justify-center px-4 py-4 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 space-y-4 md:space-y-4 sm:p-6">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign Up
                </h1>
                <form class="space-y-3" action="/signup" method="post">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name')    
                        is-invalid @enderror" placeholder="Your Name" required="" autocomplete="off" value="{{ old('name') }}" autofocus>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('username')
                        is-invalid @enderror" placeholder="Username" required="" autocomplete="off" value="{{ old('username') }}">
                        @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="telegram_id" class="block text-sm font-medium text-gray-900 dark:text-white">Telegram ID</label>
                        <a href="https://t.me/userinfobot" target="_blank" class="text-blue-600 text-sm hover:underline dark:text-blue-400">
                        Find your Telegram ID here
                        </a>
                        <input type="text" name="telegram_id" id="telegram_id" class="bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('telegram_id')
                        is-invalid @enderror" placeholder="Telegram Username" required="" autocomplete="off" value="{{ old('telegram_username') }}">
                        @error('telegram_username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="telegram_username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telegram Username</label>
                        <input type="text" name="telegram_username" id="telegram_username" class="bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('telegram_username')
                        is-invalid @enderror" placeholder="Telegram Username" required="" autocomplete="off" value="{{ old('telegram_username') }}">
                        @error('telegram_username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Password" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror" required>
                            <span id="togglePassword" class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-500 dark:text-gray-300">
                                <i id="eyeIcon" class="fas fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative space-y-4"> 
                        <label for="role" class="block text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <div class="relative">
                            <select name="role_id" id="role_id" 
                                class="block w-full py-2 pl-3 pr-10 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg 
                                    focus:ring-primary-600 focus:border-primary-600 
                                    dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->slug === 'public' ? 'selected' : '' }}>{{ $role->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-start space-x-2">
                            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            <label for="terms" class="text-sm font-light text-gray-500 dark:text-gray-300">
                                I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a>
                            </label>
                        </div>
                    
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Create an account
                        </button>
                    
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
                            Already have an account? <a href="/signin" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign In</a>
                        </p>
                    </div>                    
                </form>
            </div>
        </div>
    </div> --}}


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
                                        <h5 class="mb-0">Register Account</h5>
                                    </div>
                                    <form class="needs-validation custom-form mt-3 pt-2" action="/signup" method="post">
                                        @csrf
    
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                                                placeholder="Enter your full name" required value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" 
                                                placeholder="Enter username" required value="{{ old('username') }}">
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="mb-3">
                                            <label for="telegram_id" class="form-label">Telegram ID</label>
                                            <a href="https://t.me/userinfobot" target="_blank" class="text-primary text-sm d-block text-decoration-underline">
                                                Find your Telegram ID here
                                            </a>
                                            <input type="text" name="telegram_id" id="telegram_id" class="form-control @error('telegram_id') is-invalid @enderror" 
                                                placeholder="Enter Telegram ID" required value="{{ old('telegram_id') }}">
                                            @error('telegram_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                        <div class="mb-3">
                                            <label for="telegram_username" class="form-label">Telegram Username</label>
                                            <input type="text" name="telegram_username" id="telegram_username" class="form-control @error('telegram_username') is-invalid @enderror" 
                                                placeholder="Enter Telegram Username" required value="{{ old('telegram_username') }}">
                                            @error('telegram_username')
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
                                            <label for="role_id" class="form-label">Role</label>
                                            <select name="role_id" id="role_id" class="form-select">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $role->slug === 'public' ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input id="terms" type="checkbox" class="form-check-input" required>
                                                <label for="terms" class="form-check-label">
                                                    I accept the <a href="#" class="text-primary" style="color: #023669 !important;">Terms and Conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary w-100 waves-effect waves-light" style="background-color: #023669 !important; border-color: #023669 !important;">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <p class="text-muted mb-0">Already have an account? 
                                            <a href="{{ route('signin') }}" class="text-primary fw-semibold" style="color: #023669 !important;">Sign In</a>
                                        </p>
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
    </script>
</body>
</html>
