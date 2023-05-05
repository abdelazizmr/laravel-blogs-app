@extends('layout.app')

@section('content')

    <div class="container my-5">
        
        @unless ( count($posts) == 0 )

            <h1 class="text-primary text-center mb-4">All Posts</h1>

            <form class="d-flex justify-content-end align-items-center mb-5 gap-2">
                <input type="text" placeholder="Search a post.." name="search" class="form-control search-inp">
                <button>
                    <i class="fas fa-search"></i>
                </button>
            </form>

            @foreach ($posts as $post)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="/posts/{{$post['id']}}">
                            <h5 class="card-title">{{$post['title']}}</h5>
                        </a>
                        @if ( $post->user->id == auth()->id() )
                        <div class="d-flex gap-3">
                            <a href="/posts/{{$post['id']}}/edit" class="btn btn-sm btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="posts/{{$post['id']}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Confirm deleting this post')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{strlen($post['body']) > 50 ? substr($post['body'],0,20).'...' : $post['body'] }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text"><small class="text-muted">Published {{$post->created_at->diffForHumans()}}</small></p>
                        <p class="card-text"><small class="text-muted text-bold text-success">Author: {{$post->user->name}}</small></p>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap my-5">
                {{$posts->links()}}
            </div>

        @else
            <h1 class="text-danger text-center">There's no posts</h1>
        @endunless

    </div>

@endsection
