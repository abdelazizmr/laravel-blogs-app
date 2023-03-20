@extends('layout')

@section('content')
    
    @unless ( count($posts) == 0 )
        
        <h1 class="text-danger text-center" >All Posts</h1>

        @foreach ($posts as $post)
            <div style="border:1px solid gray" class="p-4 rounded my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/posts/{{$post['id']}}">
                        <h4>{{$post['title']}}</h4>  
                    </a>
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
                </div>
                <p>{{strlen($post['body']) > 50 ? substr($post['body'],0,20).'...' : $post['body'] }}</p>  
                <p>{{$post['date_published']}}</p>       
                
            </div>
        @endforeach

    @else
        <h1 class="text-danger text-center">There 's no posts</h1>

    @endunless

    <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap my-5">
        {{$posts->links()}}
    </div>

@endsection