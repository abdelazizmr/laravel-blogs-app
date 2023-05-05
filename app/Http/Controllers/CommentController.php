<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show form to reply to a comment
    */

    public function reply(Comment $comment){
        return view('comments.replyComment',[
            'comment' => $comment
        ]);
    } 
    
    
    /**
     * Stroe reply to a comment
    */

    public function storeReply(Request $request, Comment $comment){

        $validatedData = $request->validate([
            'body' => 'required',
        ]);


        $reply = new Comment;
        $reply->parent_id = $comment->id;
        $reply->post_id = $comment->post_id;
        $reply->user_id = auth()->id();
        $reply->body = $validatedData['body'];
        $reply->likes = 0;
        
        $reply->save();

        return redirect('/posts/' . $comment->post_id);
 
    }

    /**
     * Like a comment.
     */
    public function like(Comment $comment)
    {

        $user_id = auth()->id();

        // dd($user_id);


        // $liked = DB::table('comments_likes')

        $like = $comment->likes()
        ->where('user_id', $user_id)
        ->where('comment_id', $comment->id)
        ->first();

     


        // dd($like->id);

        if ($like) {
            // User has liked this comment
            // Decrement likes count
            $comment->decrement('likes');
            // delete it from likes table
            $like->delete();
        } else {
            // User has not liked this comment
            // Increment likes count
            $comment->increment('likes');

            // save like in comments_likes table
            $like = new Like;

            $like->comment_id = $comment->id;
            $like->user_id = $user_id;

            $like->save();
        }



        return back();
    }
}
