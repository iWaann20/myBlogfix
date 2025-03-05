<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Mews\Captcha\Facades\Captcha;


class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('login.index', [
            'title' => 'Sign In'
        ]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_src()]);
    }    
    
    public function auth(Request $request)
    {
    $credentials = $request->validate([
        'login' => ['required', 'string'],
        'password' => 'required',
        'captcha' => 'required|captcha'
        ]);

        $fieldType = User::where('username', $credentials['login'])->exists() ? 'username' : 'telegram_username';


        $user = User::where($fieldType, $credentials['login'])->first();

        if (!$user) {
            return back()->withErrors(['login' => 'Username or Telegram username not found.'])->withInput();
        }
    
        if (!$user->is_verified) {
            return back()->withErrors(['login' => 'Your account has not been verified by the admin.'])->withInput();
        }
        

        if (Auth::attempt([$fieldType => $credentials['login'], 'password' => $credentials['password']])) {
            return redirect()->intended('/');
        }
    
        return back()->withErrors([
            'login' => 'Username or Telegram username and password is wrong.',
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