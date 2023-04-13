    {{-- add comments form --}}

    <form action="/posts/{{$post->id}}/comments" class="mt-3 mb-5" method="POST">
        @csrf
        <div class="form-group my-3">
            <textarea class="form-control p-3" placeholder="Add a comment ..." id="post-body" name="body" rows="5" value="{{old('body')}}"></textarea>

            @error('body')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button class="my-1 w-100 btn btn-primary">Send</button>
    </form>