@extends('templates.master')

@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Usuarios</h3>
    </div>
</div>

<div class="row">
    <!-- tabla -->
    <div class="col-12 col-lg-8 order-last order-lg-first">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $num=>$user)
                <tr>
                    <td class="align-middle">{{ $num+1 }}</td>
                    <td class="align-middle">{{ $user->nombre }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">
                        @if($user->rol!=null)
                        {{ $user->rol->nombre }}
                        @else
                        <span class="fst-italic">Sin Rol</span>
                        @endif
                    </td>
                    <td class="align-middle">{{ $user->activo?"Cuenta Activa":"Cuenta Suspendida" }}</td>
                    <td>
                        <div class="row">
                            {{-- Borrar --}}

                            <div class="col text-end">
                                <form method="POST" action="{{route('usuarios.destroy',$user->email)}}">
                                    @method('delete')
                                    @csrf
                                    <button @if(Auth::user()->email==$user->email) disabled @endif type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar {{ $user->nombre }}">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </form>
                            </div>
                            {{-- Activar/Desactivar --}}
                            <div class="col">
                                @if($user->activo)
                                <a href="{{route('usuarios.estado',$user->email)}}" class="btn btn-sm btn-warning pb-0 text-white position-relative @if(Auth::user()->email==$user->email) disabled @endif" data-bs-toggle="tooltip" data-bs-title="Desactivar {{ $user->nombre }}">
                                    <span class="material-icons">person_off</span>
                                </a>
                                @else
                                <a href="{{route('usuarios.estado',$user->email)}}" class="btn btn-sm btn-info pb-0 text-white position-relative" data-bs-toggle="tooltip" data-bs-title="Activar {{ $user->nombre }}">
                                    <span class="material-icons">person</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- form agregar usuario -->
    <div class="col-12 col-lg-4 order-first order-lg-last">
        <div class="card">
            <div class="card-header bg-dark text-white">Agregar Usuario</div>
            <div class="card-body">
                {{-- errores --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <p>Por favor solucione los siguientes problemas:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- form --}}
                <form method="POST" action="{{route('usuarios.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Repetir Contraseña</label>
                        <input type="password" id="password2" name="password2" class="form-control @error('password') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
                            @foreach($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Cancelar</button>
                        <button class="btn btn-success" type="submit">Agregar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-referencias')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
@endsection

@section('script-manual')
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

</script>
@endsection
