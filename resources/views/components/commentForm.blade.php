    {{-- add comments form --}}

    <form action="/posts/{{$post['id']}}/comments" class="mt-3 mb-5">
        <div class="form-group my-3">
            <textarea class="form-control p-3" id="post-body" name="body" rows="5" value="{{old('body')}}">Add a Comment ...</textarea>
            @error('body')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    </form>