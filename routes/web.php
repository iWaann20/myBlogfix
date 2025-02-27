<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Http\Middleware\EnsureLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home', ['title'=>'Home']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(12)->withQueryString()]);
}); 

Route::get('/posts/{post:slug}', function (Post $post) {   

    return view ('post', ['title' => 'Blog', 'post' => $post]);
});
Route::get('/authors/{user:username}', function (User $user) {   

    return view ('posts', ['title' => count($user->posts) . ' Articles Author by ' . $user->name, 'posts' => $user->posts]);
});
Route::get('/categories/{category:slug}', function (Category $category) {   

    return view ('posts', ['title' => count($category->posts) . ' Articles about ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title'=>'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title'=>'Contact']);
});

Route::get('/signin', [LoginController::class, 'LoginForm'])->name('signin')->middleware(EnsureLogin::class);
Route::post('/signin', [LoginController::class, 'auth']);
Route::post('/signout', [LoginController::class, 'logout']);

Route::get('/signup', [RegisterController::class, 'RegisterForm']);
Route::post('/signup', [RegisterController::class, 'DataRegister']);

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::patch('/profile', [ProfileController::class, 'update']);

Route::get('/mypost', function () {
    return view('mypost', ['title'=>'My Post']);
});