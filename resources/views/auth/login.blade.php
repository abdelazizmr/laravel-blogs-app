<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body style="background-color: #f6f6f6">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>

                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                        </form>

                        <div class="text-center">
                            <span>Don't have an account?</span>
                            <a href="/signup" class="mx-1">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
