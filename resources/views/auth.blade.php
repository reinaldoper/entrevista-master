<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Viagens - @yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Controle de Viagens</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                @if (Route::currentRouteName() == 'login')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                    </li>
                @elseif (Route::currentRouteName() == 'register')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Logar</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">@yield('title')</h1>
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</body>
</html>
