<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="background-color: #f6f6f6">
    <div class="container" style="width:400px">
        <h2 class="text-center mt-5">CREATE NEW ACCOUNT</h2>

        <form action="/signup" method="POST" class="mt-5 mx-auto">
            @csrf
            <div class="form-group my-2">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="name" placeholder="Enter your full name" value="{{old('name')}}">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password ">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm your password">
                @error('password_confirmation')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3 w-100">Register</button>

            <div class="mt-5 d-flex justify-content-center gap-3">
                <span>Already have an account?</span>
                <a href="/login" class="text-center">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
