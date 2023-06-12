@extends('templates.master')

@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Roles</h3>
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
                    <th>Usuarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $num=>$rol)
                <tr>
                    <td class="align-middle">{{ $num+1 }}</td>
                    <td class="align-middle">{{ $rol->nombre }}</td>
                    <td class="align-middle">{{ count($rol->usuarios) }}</td>
                    <td>
                        <div class="row">
                            {{-- Borrar --}}
                            <div class="col text-end">
                                <form method="POST" action="{{route('roles.destroy',$rol->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button @if(Auth::user()->rol->id==$rol->id) disabled @endif type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar {{ $rol->nombre }}">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </form>
                            </div>
                            {{-- Editar --}}
                            <div class="col">
                                <a href="{{route('roles.edit',$rol->id)}}" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Editar {{ $rol->nombre }}">
                                    <span class="material-icons">edit</span>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- form agregar rol -->
    <div class="col-12 col-lg-4 order-first order-lg-last">
        <div class="card">
            <div class="card-header bg-dark text-white">Agregar Rol</div>
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
                <form method="POST" action="{{route('roles.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Cancelar</button>
                        <button class="btn btn-success" type="submit">Agregar Rol</button>
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
