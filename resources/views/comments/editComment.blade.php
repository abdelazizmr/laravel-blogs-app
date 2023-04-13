@extends('layout.app')

@section('content')
    <form action="/posts/comments/{{$comment->id}}" class="mt-3 mb-5" method="POST">
        <h2 class="text-center text-warning">Edit your comment</h2>
        @csrf
        @method('PUT')
        <div class="form-group my-3">
            <textarea class="form-control p-3" style="height:300px" id="post-body" name="body" value="{{old('body')}}">
            {{$comment->body}}
            </textarea>

            @error('body')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button class="my-1 w-100 btn btn-primary">Edit</button>
    </form>
@endsection

