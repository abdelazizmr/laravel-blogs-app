<?php



namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body','likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'comment_id');
    }

    // public function likedBy($userId)
    // {
    //     return $this->likes()->contains('user_id', $userId);
    // }



}
