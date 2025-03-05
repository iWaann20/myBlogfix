<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ $title }}</title>
</head>
<script>
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
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<body class="h-full">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        @if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full max-w-md" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-500 hover:text-green-700" onclick="this.parentElement.remove();">
            &times;
        </button>
    </div>
        @endif
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/signin" method="post">
                    @csrf
                    <div>
                        <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username or Telegram Username</label>
                        <input type="text" name="login" id="login" class="bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('login')
                        is-invalid @enderror" placeholder="Username or Telegram Username" required="" autofocus value="{{ old('login') }}">
                        @error('login')
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
                    <div>
                        <label for="captcha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Captcha</label>
                        <div class="flex items-center space-x-2">
                            <img id="captcha-img" src="{{ captcha_src() }}?t={{ time() }}" alt="captcha">
                            <button type="button" id="refresh-captcha" class="text-blue-600">🔄</button>
                        </div>
                        <input type="text" name="captcha" id="captcha" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                                   block w-full p-2.5 mt-2 dark:bg-gray-700 dark:border-gray-600 placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Enter Captcha" required>
                        @error('captcha')
                            <p class="text-red-500 text-sm mt-1">Invalid Captcha</p>
                        @enderror
                    </div>
                    <script>
                        document.getElementById('refresh-captcha').addEventListener('click', function () {
                        fetch('/refresh-captcha')
                            .then(response => response.json())
                            .then(data => {
                                let captchaImg = document.getElementById('captcha-img');
                                captchaImg.src = data.captcha + '?t=' + new Date().getTime(); 
                            })
                            .catch(error => console.error('Error refreshing captcha:', error));
                    });
                    </script>                                                  
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet? <a href="/signup" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>