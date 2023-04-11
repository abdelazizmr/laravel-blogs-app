

@extends('layout.app')

@section('content')
    
    <form class="mt-4" method="POST" action="/posts/{{$post["id"]}}">
        <h1 class="text-center">Edit Post</h1>
    @csrf  
    @method('PUT')
    <div class="form-group my-3">
        <label for="post-title">Title</label>
        <input type="text" class="form-control" id="post-title" name="title" placeholder="Enter post title"  value="{{$post["title"]}}" >
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group my-3">
        <label for="post-body">Body</label>
        <textarea class="form-control" id="post-body" name="body" rows="5" placeholder="Enter post content" >{{$post["body"]}}</textarea>
        @error('body')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
        <button type="submit" class="btn btn-primary w-100">upadte</button>
    </form>



@endsection