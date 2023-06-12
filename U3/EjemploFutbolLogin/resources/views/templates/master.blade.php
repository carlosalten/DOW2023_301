<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    @yield('hojas-estilo')
    <title>Home</title>
</head>

<body>
    <!-- barra usuario -->
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-8">
                Bienvenido <span class="fw-bold">{{Auth::user()->nombre}} </span>[{{Auth::user()->rol->nombre}}]
            </div>
            <div class="col-3 text-end d-none d-lg-block">
                {{-- Último inicio de sesión: 01/04/2023 a las 18:34 --}}
                Último inicio de sesión: {{date('d-m-Y',strtotime(Auth::user()->ultimo_login))}} a las {{date('H:i',strtotime(Auth::user()->ultimo_login))}}
            </div>
            <div class="col-1 text-end d-none d-lg-block">
                <a href="{{route('usuarios.logout')}}" class="text-white">Cerrar Sesión</a>
            </div>
        </div>
    </div>

    <!-- navbar -->
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EIN133_A</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if(Route::current()->getName()=='home.index') active @endif" aria-current="page" href="{{ route('home.index') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(str_starts_with(Route::current()->getName(),'equipos')) active @endif" href="{{ route('equipos.index') }}">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Estadios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Estadísticas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(str_starts_with(Route::current()->getName(),'jugadores')) active @endif" href="{{ route('jugadores.index') }}">Jugadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(str_starts_with(Route::current()->getName(),'partidos')) active @endif" href="{{route('partidos.index')}}">Partidos</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Configuración
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark bg-primary">
                                <li><a class="dropdown-item" href="{{route('usuarios.cambiarcontrasena')}}">Cambiar Contraseña</a></li>
                                <li><a class="dropdown-item" href="{{route('roles.index')}}">Roles</a></li>
                                <li><a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="https://www.usm.cl">UTFSM</a></li>
                            </ul>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="{{route('usuarios.logout')}}">Cerrar Sesión</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!-- contenido principal -->
    <div class="container-fluid">
        @yield('contenido-principal')
    </div>

    @yield('script-referencias')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @yield('script-manual')
</body>

</html>
