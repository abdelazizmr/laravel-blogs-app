<?php

use App\Http\Controllers\PostController;
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



// get all posts
Route::get('/',[PostController::class, 'index']);


// show form for adding new post 
Route::get('/posts/create', [PostController::class, 'create']);


// store form data
Route::post('/posts', [PostController::class, 'store']);


// get a single post
Route::get('/posts/{id}', [PostController::class, 'show']);


// redirection
Route::redirect('/*', '/', 301);
