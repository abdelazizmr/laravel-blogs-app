

@extends('layout')

@section('content')
    
    <form class="mt-4" method="POST" action="/posts">
    @csrf  
    <div class="form-group">
        <label for="post-title">Title</label>
        <input type="text" class="form-control" id="post-title" name="title" placeholder="Enter post title"  value="{{old('title')}}" >
        @error('title')
            <p>{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="post-body">Body</label>
        <textarea class="form-control" id="post-body" name="body" rows="5" placeholder="Enter post content" value="{{old('body')}}"></textarea>
        @error('body')
            <p>{{$message}}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>



@endsection