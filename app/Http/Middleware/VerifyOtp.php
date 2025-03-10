<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureOtpVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (session('pending_user_id')) {
            return redirect()->route('verifyotp')->withErrors(['otp' => 'Silakan masukkan OTP untuk menyelesaikan login.']);
        }

        return $next($request);
    }
}
