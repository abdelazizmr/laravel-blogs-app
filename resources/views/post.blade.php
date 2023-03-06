@extends('layout')
@section('content') 
    <h4>{{$post['title']}}</h4>  
    <p>{{$post['body']}}</p>  
    <span>{{$post['date_published']}}</span>   
@endsection  

