<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Bagas Raditya Nafi",
        "email" => "bagasrnfull@gmail.com",
        "image" => "https://i.ibb.co/FwwW04w/fotoku.png"
    ]);
});



Route::get('/posts', [PostController::class, 'index']);
// halaman single post
// jika hanya {post} maka default nya akan mencari id
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => "categories",
        'categories' => Category::all()
    ]); 
});

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'title' => "Post by Category : $category->name",
        "active" => "categories",
        'posts' => $category->posts->load('category')
    ]);
});

Route::get('/authors', function(){ 
    return view('authors', [
        'title' => 'Authors',
        "active" => "authors",
        'authors' => User::all()
    ]);
});

Route::get('/authors/{author:username}', function(User $author){ //user dialias author
    return view('posts', [
        'title' => "Post by Author : $author->name",
        "active" => "authors",
        'author' => $author->name,
        'posts' => $author->posts->load('category')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
        return view('dashboard.index');
    })->middleware('auth');

    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// except berfungsi untuk mematikan suatu route agar tidak bisa diakses
// admin adalah middleware yang dibuat sendiri
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
