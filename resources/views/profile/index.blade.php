@extends('layout.app')
@section('content')
<div class="container my-5">
        <div class="main-body">


        <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
        <div class="card">
        <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
        <img src="/images/{{$profile['profile_image']}}" alt="Profile_picture" class="rounded-circle" width="200" height="200" style="background-size: cover; background-position:center">
        <div class="mt-3">
        <h4>{{$profile->full_name ? $profile->full_name : auth()->user()->name}}</h4>
        <p class="text-secondary mb-1">{{$profile->bio}}</p>
        <p class="text-muted font-size-sm">{{$profile->adress}}</p>
        <a class="btn btn-primary w-100 my-2" href="/profile/edit/{{$profile->id}}">Edit Profile</a>
        
        </div>
        </div>
        </div>
        </div>

        </div>
        <div class="col-md-8">
        <div class="card mb-3">
        <div class="card-body">
        <div class="row">
        <div class="col-sm-3">
        <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        {{$profile['full_name']}}
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-3">
        <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            {{auth()->user()->email}}
        </div>
        </div>
        <hr>
        
        <div class="row">
        <div class="col-sm-3">
        <h6 class="mb-0">Edit Bio</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        {{$profile->bio}}
        </div>
        </div>
         <hr>
        <div class="row">
        <div class="col-sm-3">
        <h6 class="mb-0">Phone</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        {{$profile->phone}}
        </div>
        </div>
       
        <hr>
        <div class="row">
        <div class="col-sm-3">
        <h6 class="mb-0">Address</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        {{$profile->address}}
        </div>




</div>

<div class="d-flex justify-content-end">
    <a class="btn btn-danger my-3" href="/profile/{{auth()->id()}}/delete">Delete account</a>
</div>
@endsection

