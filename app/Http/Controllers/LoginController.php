<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('login.index', [
            'title' => 'Sign In'
        ]);
    }
    
    public function auth(Request $request)
    {
    $credentials = $request->validate([
        'login' => ['required', 'string'],
        'password' => 'required',
        'g-recaptcha-response' => 'required'
        ]);

    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);
    if (!$response->json('success')) {
            return back()->withErrors(['captcha' => 'Captcha verification failed']);
        }

        $fieldType = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $credentials['login'], 'password' => $credentials['password']])) {
            return redirect()->intended('/');
        }
    
        return back()->withErrors([
            'login' => 'Email or username and password is wrong.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}