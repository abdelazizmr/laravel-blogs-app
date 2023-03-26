<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts || laravel</title>
    {{-- bootsratp --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>

        header,footer{
            background-color: rgb(245, 245, 180);
        }

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
        <header  class="p-4 mb-4 mx-auto d-flex justify-content-between"  >
            <a href="/"><h4>Home</h4></a>
            @auth
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <span>{{auth()->user()->name}}</span>
                    <a href="/posts/create">Add a Post </a>
                    <a href="/logout">Log out</a>
                </div>
            @else
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="/signup">Sign up</a>
                    <a href="/login">Log in</a>
                </div>
            @endauth
        </header>
        <div class="container px-5">


            

            <div>
                @yield('content')
            </div>


        </div>    
  
         <footer class="mt-5 text-center fixed-bottom">
            &copy 2023
        </footer>

</body>
</html>