<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profile()
    {
        return view('profile.index', [
            'title' => 'Profile'
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username,' . Auth::id()],
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $user = Auth::user();


        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            
        
            if ($user->profile_picture) {
                \Storage::disk('public')->delete($user->profile_picture);
            }

            $user->profile_picture = $profilePath;
        }


        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'profile_picture' => $user->profile_picture
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
