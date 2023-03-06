@extends('layout')

@section('content')
    
    @unless (count($posts) == 0 )
        
        <h1 class="text-danger" style="text-align: center">All Posts</h1>

        @foreach ($posts as $post)
            <div style="padding: 20px; border:1px solid gray">
                <a href="/posts/{{$post['id']}}">
                    <h4>{{$post['title']}}</h4>  
                </a> 
                    <p>{{$post['body']}}</p>  
                    <span>{{$post['date_published']}}</span>       
                
            </div>
        @endforeach

    @else
        <h1>There 's no posts</h1>

    @endunless

@endsection