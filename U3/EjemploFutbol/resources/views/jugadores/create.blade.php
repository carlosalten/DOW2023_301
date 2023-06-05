@extends('templates.master')

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col-8">
        <h3>Agregar Jugador</h3>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end">
        <a href="{{route('jugadores.index')}}" class="btn btn-warning">Cancelar</a>
    </div>
</div>

{{-- formulario --}}
<div class="col">
    <div class="card">
        <div class="card-header bg-dark text-white">Ingrese los datos del nuevo jugador</div>
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

            {{-- formulario --}}
            <form method="POST" action="{{route('jugadores.store')}}">
                @csrf
                {{-- rut --}}
                <div class="mb-3">
                    <label for="rut" class="form-label">RUT</label>
                    <input type="text" id="rut" name="rut" class="form-control" value="{{old('rut')}}">
                </div>
                {{-- nombre --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre')}}">
                </div>
                {{-- apellido --}}
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="{{old('apellido')}}">
                </div>
                {{-- número de camiseta --}}
                <div class="mb-3">
                    <label for="numero_camiseta" class="form-label">Número de Camiseta</label>
                    <input type="text" id="numero_camiseta" name="numero_camiseta" class="form-control" value="{{old('numero_camiseta')}}">
                </div>
                {{-- posición en la que juega --}}
                <div class="mb-3">
                    <label class="form-label">Posición</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="posicion" id="pos_arquero" value="Arquero" checked>
                        <label class="form-check-label" for="pos_arquero">
                            Arquero
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="posicion" id="pos_defensa" value="Defensa">
                        <label class="form-check-label" for="pos_defensa">
                            Defensa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="posicion" id="pos_volante" value="Volante">
                        <label class="form-check-label" for="pos_volante">
                            Volante
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="posicion" id="pos_delantero" value="Delantero">
                        <label class="form-check-label" for="pos_delantero">
                            Delantero
                        </label>
                    </div>
                </div>
                {{-- equipo --}}
                <div class="mb-3">
                    <label class="form-label" for="equipo">Equipo</label>
                    <select id="equipo" name="equipo" class="form-control">
                        @foreach($equipos as $equipo)
                        <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- botones --}}
                <div class="mb-3 d-grid gap-2 d-lg-block">
                    <button class="btn btn-warning" type="reset">Cancelar</button>
                    <button class="btn btn-success" type="submit">Agregar Jugador</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
