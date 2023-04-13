<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        $comment = new Comment;
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id();
        $comment->body = $validatedData['body'];
        $comment->likes = 0;
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.editComment',[
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Comment $comment)
    {
        $fields = $request->validate([
            "body" => "required"
        ]);

        $comment->update($fields);


        $post_id = $comment->post_id ;

        // dd($post_id);

        return redirect('/posts/'.$post_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
