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




Route::get('/',[PostController::class, 'index']);

Route::get('/posts/{id}', [PostController::class, 'show']);


// redirection
Route::redirect('/*', '/', 301);
