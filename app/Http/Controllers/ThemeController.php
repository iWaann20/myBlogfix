<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function saveTheme(Request $request)
    {
        $user = Auth::user();
        $user->theme_preferences = $request->all();
        $user->save();

        return response()->json(['success' => true]);
    }
}
