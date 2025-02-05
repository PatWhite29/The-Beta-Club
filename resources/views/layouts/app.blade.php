<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
    /* Fondo negro y texto blanco */
    body {
        background-color: black;
        color: white;
    }

    /* Barra de navegación negra */
    .navbar {
        background-color: #000; /* Negro */
    }

    /* Enlaces de la barra de navegación */
    .navbar-light .navbar-nav .nav-link {
        color: white; /* Texto blanco */
    }

    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link.active {
        color: #6f42c1; /* Nuevo morado para el hover y el seleccionado */
    }

    /* Ajustes adicionales para los dropdowns */
    .dropdown-menu {
        background-color: #333; /* Fondo oscuro en el dropdown */
        color: white;
    }

    .dropdown-item {
        color: white;
    }

    .dropdown-item:hover {
        background-color: #6f42c1; /* Nuevo morado en hover de los dropdowns */
    }

    /* Alertas con texto oscuro sobre fondo claro */
    .alert {
        color: #333; /* Texto oscuro para las alertas */
    }

    .alert-success {
        background-color: #28a745; /* Verde para éxito */
        color: white;
    }

    .alert-danger {
        background-color: #dc3545; /* Rojo para error */
        color: white;
    }

    /* Centrado del nombre de la marca */
    .navbar-brand-container {
        position: absolute;
        left: 43%;
        transform: translateX(-50%);
        top: 50%;
        transform: translateY(-50%);
    }
    .navbar-brand {
        color: #6f42c1; /* Nuevo color morado */
        font-size: 2rem; /* Tamaño de texto grande */
        transition: color 0.3s ease; /* Transición suave */
    }

    /* Cambiar el color a blanco cuando está activo o seleccionado */
    .navbar-brand.active,
    .navbar-brand:hover {
        color: white;
    }
    </style>    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">
                <!-- Sección de la izquierda con "Boulders" -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">
                            Boulders
                        </a>
                    </li>
                </ul>

                <!-- Sección central con el nombre de la marca centrado -->
                <div class="navbar-brand-container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- Sección de la derecha con opciones de autenticación -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center justify-content-end" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <img src="{{ asset(Auth::user()->profile_image ?? 'default/profile.png') }}" 
                                         class="rounded-circle ms-2"
                                         width="40" 
                                         height="40" 
                                         alt="{{ Auth::user()->name }}">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>  
                @endif

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
