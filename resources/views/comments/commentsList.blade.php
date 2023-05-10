@if ($comments->count() > 0)
    <h4 class="text-danger text-center mb-3"> Comments </h2>

    <ul class="list-group p-3">
        @foreach ($post->comments as $comment)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <img src="/images/{{$post->user->profile->profile_image}}" alt="profile" width="30px" height="30px" style="border-radius:50%">
                        <h5 class="comment-author font-weight-bold my-3 text-warning">{{ $comment->user->name }}</h5>
                    </div>
                    <div class="comment-actions d-flex justify-content-center gap-3">

                        <a href="/posts/comments/{{$comment->id}}/reply"><i class="fa-solid fa-reply"></i></a>
                      

                        @if (auth()->check() && auth()->user()->id === $comment->user_id)
                            <a href="/posts/comments/{{$comment->id}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form method="POST" action="/posts/comments/{{$comment->id}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Confirm deleting this comment ')" class="text-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        @endif
                    </div>
                    
                </div>


                <div>
                    <p class="comment-body card-text px-5">{{ $comment->body }}</p>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-2 my-2">
                    <form action="/posts/comments/{{$comment->id}}/like" method="POST">
                        @csrf
                            @php
                                $liked = $comment->likes()
                                ->where('user_id', auth()->id())
                                ->where('comment_id', $comment->id)
                                ->exists();
                            @endphp
                     
                            @if($liked)
                            <button class="text-danger">
                                <i class="fa-solid fa-thumbs-up"></i>  
                            </button>
                            @else
                                <button>
                                    <i class="fa-solid fa-thumbs-up"></i>  
                                </button>
                            @endif            
 
                    </form>
                    <span>{{$comment->likes}} Likes</span>
                </div>

                {{-- replies --}}
                <div class="d-flex">

                    @if ($comment->replies()->count() > 0)

                    <ul class="comment-replies ms-3 my-2">
                        @foreach ($comment->replies as $reply)
                            <li class="comment-reply my-3">
                                <div class="comment-author font-weight-bold text-success">
                                    {{ $reply->user->name }}
                                </div>
                                <div class="comment-body d-flex flex-wrap gap-2">
                                    <div class="font-weight-bold text-warning">
                                        <span>@</span>
                                        <span>{{$comment->user->name}}</span>
                                    </div>
                                    <p>{{ $reply->body }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>        
                    @else
                        <span class="mb-2 text-danger">No reply to this comment</span>
                    @endif
                 
                </div>
                    
            
            </li>
        @endforeach
    </ul>
@endif
