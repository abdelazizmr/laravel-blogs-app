@extends('layout.app')

@section('content')

    <div class="container my-5">
        
        @unless ( count($posts) == 0 )


            <form class="d-flex justify-content-end align-items-center mb-5 gap-2">
                <input type="text" placeholder="Search a post.." name="search" class="form-control search-inp">
                <button>
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <div class="row">
               @foreach ($posts as $post)
               <div class="col-sm-4">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            
                                <h5 class="card-title">{{$post['title']}}</h5>
                        
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
                        <a href="/posts/{{$post['id']}}" class="px-3 pb-2 d-flex justify-content-end text-danger">
                            See more
                        </a>
                        <div class="card-footer">
                            <p class="card-text"><small class="text-muted">Published {{$post->created_at->diffForHumans()}}</small></p>
                            <p class="card-text d-flex align-items-center gap-3">
                                <img src="/images/{{$post->user->profile->profile_image}}" alt="profile" width="30px" height="30px" style="border-radius:50%">
                                <small class="text-muted text-bold text-success">Author: {{$post->user->name}}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach 
            </div>
            

            <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap my-5">
                {{$posts->links()}}
            </div>

        @else
            <h1 class="text-danger text-center">There's no posts</h1>
        @endunless

    </div>

@endsection
