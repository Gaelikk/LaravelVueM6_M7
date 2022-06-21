<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ScapeRoom GC @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-warning">
    <div class="container-fluid ">
        <a class="navbar-brand text-left" href="{{ url('/menu') }}">Escape Room Caraballo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" aria-current="page" href={{url('/games')}}>Jocs</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href={{url('/rooms')}}>Sales</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link" aria-current="page"
                                            href={{url('/reviews')}}>Valoracions</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href={{url('/books')}}>Reserves</a>
                    </li>
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item"><a class="nav-link" aria-current="page" href={{url('/users')}}>Usuaris</a>
                        </li>
                    @endif
                    <li class="nav-item"><a class="nav-link" aria-current="page"
                                            href={{url('/account')}}><strong>Compte</strong></a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href={{url('/logout')}}>Logout</a></li>
                @endauth
                @guest
                    <li class="nav-item"><a class="nav-link" aria-current="page" href={{url('/login')}}>Login</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
