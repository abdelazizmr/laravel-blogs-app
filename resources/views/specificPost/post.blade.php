@extends('layout.app')
@section('content') 


    <div class="my-5">
        <h4>{{$post['title']}}</h4>  
        <p>{{$post['body']}}</p>  
        <span>{{$post['created_at']}}</span>    
        <p>Author : <span class="text-success">{{$post->user->name}}</span></p>  
    </div>   


    {{-- comments section --}}
    @include('components.commentsList')




    {{-- comment form --}}

    @include('components.commentForm')

    




@endsection  


