@extends('layout.app')

@section('content')

    <div class="my-3">
           <h2 class="text-center text-warning">Reply to this comment</h2>

           <div class="list-group-item p-3">

                <h5 class="comment-author font-weight-bold my-3 text-warning">{{ $comment->user->name }}</h5>

                <div>
                    <p class="comment-body">{{ $comment->body }}</p>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-2 my-2">
                    <span>{{$comment->likes}} Likes</span>
                </div>

           </div>
                
    </div>

    <form action="/posts/comments/{{$comment->id}}/reply" class="mt-3 mb-5" method="POST">
     
        @csrf
        <div class="form-group my-3">
            <textarea class="form-control p-3" style="height:300px" id="post-body" name="body" value="{{old('body')}}">
            </textarea>

            @error('body')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button class="my-1 w-100 btn btn-primary">Reply</button>
    </form>
@endsection

