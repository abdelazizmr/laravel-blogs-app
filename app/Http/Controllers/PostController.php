<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show all posts 
    public function index(){
        return view(
            'posts',
            [
                'posts' => Post::latest()->filter(request(['search']))->simplePaginate(6)
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

    // show the add post form 
    public function create(){
        return view('addPost');
    }


    // store the add post form data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->user_id = auth()->id();
        $post->save();

        return redirect('/');
    }


    // show form to edit a post
    public function edit(Post $post){
       // dd(Post::find($id));
        return view(
            'editPost',
            [
                'post' => $post
            ]
        );
    }

    // update the post in the database
    public function update(Request $request, Post $post)
    {
        $fields = $request->validate([
            "title" => "required",
            "body" => "required"
        ]);

        $post->update($fields);

        return redirect('/');
    }
    
    
    // delete the post from the database
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }
}
