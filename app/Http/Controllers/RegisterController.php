<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function RegisterForm()
    {
        return view('register.index', [
            'title' => 'Sign Up'
        ]);
    }

    public function DataRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255' 
        ]);

        User::create($validatedData);
        return redirect('/signin')->with('success', 'Account has been created!');
    }
}
