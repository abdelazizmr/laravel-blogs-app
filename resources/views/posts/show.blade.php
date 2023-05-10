@extends('layout.app')
@section('content') 


<div class="card my-5">
  <div class="card-body">
    <h4 class="card-title">{{$post->title}}</h4>
    <p class="card-text">{{$post->body}}</p>
    <div class="card-footer">
      <small class="text-muted">Posted {{$post->created_at->diffForHumans()}} by 
        <span class="text-success text-bold ms-2">{{$post->user->name}}</span></small>
        <img src="/images/{{$post->user->profile->profile_image}}" alt="profile" width="30px" height="30px" style="border-radius:50%" class="ms-2">
    </div>
  </div>
</div>


    {{-- comments section --}}
    @include('comments.commentsList')




    {{-- comment form --}}

    @include('comments.commentForm')

    




@endsection  


