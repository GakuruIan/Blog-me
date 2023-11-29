<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CommentController;

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

// login middleware
Route::middleware('guest')->group(function () {
    Route::get('/',[UserController::class,'LoginForm'])->name('login');
    // Loginuser
    Route::post('/login',[UserController::class,'Login']);
});


// register form
Route::get('/register',[UserController::class,'RegisterForm']);

// show profile page
Route::get('/profile',[UserController::class,'ProfileForm'])->middleware('auth');

// showing all the blogs
Route::get('/blogs',[BlogsController::class,'ShowBlogs']);

// showing all of users blogs
Route::get('/myblogs',[BlogsController::class,'MyBlogs'])->middleware('auth');

Route::post('/search',[BlogsController::class,'Search']);

// show a single blog
Route::get('/blog/{id}',[BlogsController::class,'ShowBlog']);

// fetch blog according to tag
Route::get('blog/tag/{tag}',[BlogsController::class,'FetchBlogTag']);

// showing create blog page
Route::get('/create',[BlogsController::class,'CreateBlogForm'])->middleware('auth');

//creating a blog
Route::post('/create/blog',[BlogsController::class,'Create']);

// update blog form
Route::get('/Edit/blog/{id}',[BlogsController::class,'UpdateBlogForm']);

// Updating a blog 
Route::put('/Update/blog/{id}',[BlogsController::class,'Update']);

// Registering new user
Route::post('/register',[UserController::class,'Register']);

// commenting on blog
Route::post('/comment',[CommentController::class,'Postcomment']);

// Updating profile
Route::post('/update/profile',[UserController::class,'Update']);

// logging out user
Route::post('/logout',[UserController::class,'Logout'])->name('logout');

// Deleting post
Route::delete('/delete/blog',[BlogsController::class,'Delete']);


