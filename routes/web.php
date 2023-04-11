<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    // show signup form
    Route::get('/signup', [userController::class, 'create']);

    // add new user
    Route::post('/signup', [userController::class, 'store']);

    // show login form
    Route::get('/login', [userController::class, 'login'])->name('login');

    // login user
    Route::post('/login', [userController::class, 'authencticate'])->name('login');
});

Route::middleware(['auth'])
    ->group(function () {
    // get all posts
    Route::get('/', [PostController::class, 'index']);


    // show form for adding new post 
    Route::get('/posts/create', [PostController::class, 'create']);


    // store the post in database
    Route::post('/posts', [PostController::class, 'store']);

    // show form for edit a post
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

    // update the post in the database
    Route::put('/posts/{post}', [PostController::class, 'update']);

    // delete the post from the database
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);


    // get a single post
    Route::get('/posts/{post}', [PostController::class, 'show']);


    // logout the user
    Route::post('/logout', [userController::class, 'logout']);
});




