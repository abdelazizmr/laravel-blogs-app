@extends('layout')
@section('content') 
    <div class="my-5">
        <h4>{{$post['title']}}</h4>  
        <p>{{$post['body']}}</p>  
        <span>{{$post['date_published']}}</span>    
    </div>   
@endsection  


