@if ($comments->count() > 0)
    <h2 class="text-danger text-center mb-3">Comments</h2>

    <ul class="list-group p-3">
        @foreach ($post->comments as $comment)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="comment-author font-weight-bold my-3 text-warning">{{ $comment->user->name }}</h5>
                    <div class="comment-actions d-flex justify-content-center gap-3">

                        <a href="/posts/comments/{{$comment->id}}/reply"><i class="fa-solid fa-reply"></i></a>
                      

                        @if (auth()->check() && auth()->user()->id === $comment->user_id)
                            <a href="/posts/comments/{{$comment->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="POST" action="/posts/comments/{{$comment->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        @endif
                    </div>
                    
                </div>


                <div>
                    <p class="comment-body">{{ $comment->body }}</p>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-2 my-2">
                    <form action="/posts/comments/{{$comment->id}}/like" method="POST">
                        @csrf
                        <button>
                            <i class="fa-solid fa-thumbs-up"></i>
                        </button>
                    </form>
                    <span>{{$comment->likes}} Likes</span>
                </div>

                {{-- replies --}}
                <div class="d-flex">
                    @if ($comment->replies()->count() > 0)

                    <ul class="comment-replies w-70 ms-5 d-flex justfiy-content-end my-2">
                        @foreach ($comment->replies as $reply)
                            <li class="comment-reply">
                                <div class="comment-body">{{ $reply->body }}</div>
                                <div class="comment-author">{{ $reply->user->name }}</div>
                            </li>
                        @endforeach
                    </ul>        
                    @else
                        <span>No reply to this comment</span>
                    @endif
                 
                </div>
                    
            
            </li>
        @endforeach
    </ul>
@endif
