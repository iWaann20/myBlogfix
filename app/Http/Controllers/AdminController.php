<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil query pencarian

        $users = User::where('is_verified', false) // Filter user yang belum diverifikasi
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('username', 'like', "%{$search}%")
                      ->orWhere('telegram_username', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); 

        return view('admin.index', [
            'title' => 'Verify Users',
            'users' => $users,
            'search' => $search, 
        ]);
    }

    public function verify(User $user)
    {
        $user->update(['is_verified' => true]);
        return redirect('/admin')->with('success', 'User verified successfully.');
    }

}
