<?php

use Illuminate\Http\Request;
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








Route::get('/', function () {
    return '<h1>home</h1>';
});

Route::get('/posts', function(){
    return view('posts',
    [
        'posts' => Post::all()         
    ]
    );
});

Route::get('/posts/{id}', function ($id) {
    return view('post',
        [
            'post' => Post::find($id)
        ]
    );
});

// redirection
Route::redirect('/logout', '/', 301);
