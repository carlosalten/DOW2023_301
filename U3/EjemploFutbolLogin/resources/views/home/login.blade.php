<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    <title>Campeonato de Fútbol USM</title>
</head>

<body style="background: linear-gradient(to bottom, #026597 43%, #990099 100%);">
    <div class="container-fluid min-vh-100 d-flex flex-column justify-content-lg-center">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="row bg-white">
                    <!-- isotipo -->
                    <div class="col-12 col-lg-4 bg-primary text-white d-flex flex-column justify-content-center align-items-center">
                        <div class="bg-white p-2 mb-3 rounded">
                            <img src="{{asset('images/isotipo_usm_color.jpg')}}" style="width: 7rem;">
                        </div>
                        <h5 class="text-center">Sistema de Campeonato de Fútbol</h5>
                        <h6 class="text-center">EIN133_A Diseño y Programación Orientada a la Web</h6>
                    </div>

                    <!-- formulario -->
                    <div class="col-12 col-lg-8 py-4">
                        <h4>Inicio de Sesión</h4>
                        <p class="text-primary mb-2">Proporcione sus credenciales para ingresar al sistema</p>
                        {{-- mensajes de error --}}
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                        {{-- fin mensajes de error --}}
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('usuarios.autenticar')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
