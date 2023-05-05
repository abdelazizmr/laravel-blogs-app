<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts || laravel</title>
    {{-- bootsratp --}}
    {{-- css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    

    <style>

      

        button{
            border: none;
            outline: none;
            background-color: transparent;
        }
        .search-inp{
            width: 200px
        }
        a{
            text-decoration: none;
        }
        a:hover{
            color: red;
            transition: .3s all
        }


    </style>

</head>
<body>
        <header class="p-4 mb-4 mx-auto d-flex justify-content-between bg-light">
        <a class="text-decoration-none" href="/">
            <h4 class="text-primary">Home</h4>
                </a>
            @auth
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <a class="btn btn-primary" href="/posts/create">
                        <i class="fa-sharp fa-regular fa-plus"></i>
                        Add a Post
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="#">Profile</a>
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                    Log out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            @else
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <a class="btn btn-primary" href="/signup">
                        <i class="fa-solid fa-user-plus"></i>
                        Sign up
                    </a>
                    <a class="btn btn-secondary" href="/login">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Log in
                    </a>
                </div>
            @endauth
</header>

        <div class="container px-5">


            

      
                @yield('content')
        


        </div>    
  

</body>
</html>