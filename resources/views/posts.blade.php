@extends('layout')

@section('content')
    
    @unless ( count($posts) == 0 )
        
        <h1 class="text-danger text-center" >All Posts</h1>

        <form action="/" class="my-5 d-flex justify-content-end align-items-center gap-2">
            <input type="text" placeholder="Serach a post.." name="search" class="form-control search-inp">
            <button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        @foreach ($posts as $post)
            <div style="border:1px solid gray" class="p-4 rounded my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/posts/{{$post['id']}}">
                        <h4>{{$post['title']}}</h4>  
                    </a>
                    @if ( $post->user->id == auth()->id() )
                    <div class="d-flex gap-3">
                        <a href="/posts/{{$post['id']}}/edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a> 
                        <form method="POST" action="posts/{{$post['id']}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>    
                    @endif
                </div>
                <p>{{strlen($post['body']) > 50 ? substr($post['body'],0,20).'...' : $post['body'] }}</p>  
                <p>{{$post['date_published']}}</p> 
                <p>Author : <span class="text-success">{{$post->user->name}}</span></p>      
                
            </div>
        @endforeach

    @else
        <h1 class="text-danger text-center">There 's no posts</h1>

    @endunless

    <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap my-5">
        {{$posts->links()}}
    </div>

@endsection