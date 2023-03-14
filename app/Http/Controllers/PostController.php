<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    // show all posts 
    public function index(){
        return view(
            'posts',
            [
                'posts' => Post::latest()->filter(request(['search']))->get()
            ]
        );
    }

    // show a single post
    public function show($id){
        return view(
            'post',
            [
                'post' => Post::find($id)
            ]
        );
    }
}
