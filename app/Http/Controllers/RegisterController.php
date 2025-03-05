<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RegisterController extends Controller
{
    public function RegisterForm()
    {
        $roles = Role::all();
        $roles = Role::where('slug', '!=', 'admin')->get();
        return view('register.index', compact('roles'), [
            'title' => 'Sign Up'
        ]);
    }

    public function DataRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'telegram_username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required|min:8|max:255',
            'role_id' => 'required',
        ]);

        User::create($validatedData);
        return redirect('/signin')->with('success', 'Account has been created!');
    }
}
