<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('is_verified', false)->get();
        return view('admin.index', compact('users'), [
            'title' => 'Verify Users'
        ]);
    }

    public function verify(User $user)
    {
        $user->update(['is_verified' => true]);
        // dd('Verified');
        return redirect('/admin')->with('success', 'User verified successfully.');
    }

}
