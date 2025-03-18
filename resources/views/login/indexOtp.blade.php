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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<body class="h-full">
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">OTP Verification</h2>
    
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('otp.verify') }}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Enter Code:</label>
                <input type="text" name="otp" class="w-full border rounded p-2" required>
                @error('otp')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full text-white bg-primary-900 hover:bg-primary-950 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Verifikasi</button>
        </form>
        <form id="resendOtpForm" onsubmit="sendOtp(event)" class="mt-4">
            @csrf
            <button id="resendOtpButton" type="submit"
                class="w-full text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                Kirim Ulang OTP
            </button>
        </form>    
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            checkCooldown();
        });
    
        function sendOtp(event) {
            event.preventDefault(); // Mencegah submit default
    
            let button = document.getElementById('resendOtpButton');
    
            fetch("{{ route('otp.send') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json().then(data => ({ status: response.status, body: data })))
            .then(({ status, body }) => {
                if (status === 429) { // Jika cooldown masih berjalan
                    let remainingTime = body.remaining * 1000;
                    localStorage.setItem('otpCooldown', Date.now() + remainingTime);
                    startCooldown(remainingTime);
                } else if (body.expires_at) { // Jika OTP berhasil dikirim
                    let remainingTime = 5 * 60 * 1000;
                    localStorage.setItem('otpCooldown', Date.now() + remainingTime);
                    startCooldown(remainingTime);
                    alert(body.message);
                } else {
                    alert(body.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    
        function checkCooldown() {
            let cooldownTimestamp = localStorage.getItem('otpCooldown');
            let button = document.getElementById('resendOtpButton');
    
            if (!cooldownTimestamp) {
                button.disabled = false;
                button.textContent = "Kirim Ulang OTP";
                return;
            }
    
            let remainingTime = cooldownTimestamp - Date.now();
            if (remainingTime > 0) {
                startCooldown(remainingTime);
            } else {
                localStorage.removeItem('otpCooldown');
                button.disabled = false;
                button.textContent = "Kirim Ulang OTP";
            }
        }
    
        function startCooldown(timeRemaining) {
            let button = document.getElementById('resendOtpButton');
            button.disabled = true;
    
            let interval = setInterval(() => {
                if (timeRemaining <= 0) {
                    clearInterval(interval);
                    localStorage.removeItem('otpCooldown');
                    button.disabled = false;
                    button.textContent = "Kirim Ulang OTP";
                    return;
                }
    
                timeRemaining -= 1000;
                let minutes = Math.floor(timeRemaining / 60000);
                let seconds = Math.floor((timeRemaining % 60000) / 1000);
                button.innerText = `Wait ${minutes}:${seconds < 10 ? "0" : ""}${seconds} minute`;
            }, 1000);
        }
    </script>
</body>
</html>