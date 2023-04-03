@extends('layout')
@section('content') 
    <div class="my-5">
        <h4>{{$post['title']}}</h4>  
        <p>{{$post['body']}}</p>  
        <span>{{$post['date_published']}}</span>    
        <p>Author : <span class="text-success">{{$post->user->name}}</span></p>  
    </div>   
@endsection  


