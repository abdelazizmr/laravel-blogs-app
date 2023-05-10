@extends('layout.app')


@section('content')
<form class="my-3 mx-auto" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3 d-flex align-items-center gap-5">
       
        <div>
            <label for="profilePicture" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="profilePicture" name="profile_picture">
        </div>
         <div>
             <img src="/images/{{$profile['profile_image']}}" alt="profile" class="rounded-circle" width="150" height="150">
        </div>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Full name</label>
        <input type="text" class="form-control" name="name" value="{{$profile['full_name']}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
    </div>
    <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea class="form-control" id="bio" name="bio">{{ $profile->bio }}</textarea>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $profile->address }}">
    </div>
    
    <button type="submit" class="btn btn-primary my-3">Save Changes</button>
</form>

@endsection