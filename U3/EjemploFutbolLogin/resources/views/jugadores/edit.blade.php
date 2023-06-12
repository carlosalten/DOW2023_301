@extends('templates.master')

@section('contenido-principal')
<div class="row mt-2">
    <div class="col-8">
        <h3>Editar Jugador</h3>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header bg-dark text-white">Editar jugador {{$jugador->nombre}} {{$jugador->apellido}}</div>
            <div class="card-body">
                <form method="POST" action="{{route('jugadores.update',$jugador->rut)}}">
                    @method('put')
                    @csrf
                    {{-- rut --}}
                    <div class="mb-3">
                        <label for="rut" class="form-label">RUT</label>
                        <input type="text" id="rut" name="rut" class="form-control" value="{{$jugador->rut}}">
                    </div>
                    {{-- nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{$jugador->nombre}}">
                    </div>
                    {{-- apellido --}}
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" value="{{$jugador->apellido}}">
                    </div>
                    {{-- número de camiseta --}}
                    <div class="mb-3">
                        <label for="numero_camiseta" class="form-label">Número de Camiseta</label>
                        <input type="text" id="numero_camiseta" name="numero_camiseta" class="form-control" value="{{$jugador->numero_camiseta}}">
                    </div>
                    {{-- posición en la que juega --}}
                    <div class="mb-3">
                        <label class="form-label">Posición</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="posicion" id="pos_arquero" value="Arquero" @if($jugador->posicion=='Arquero') checked @endif>
                            <label class="form-check-label" for="pos_arquero">
                                Arquero
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="posicion" id="pos_defensa" value="Defensa" @if($jugador->posicion=='Defensa') checked @endif>
                            <label class="form-check-label" for="pos_defensa">
                                Defensa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="posicion" id="pos_volante" value="Volante" @if($jugador->posicion=='Volante') checked @endif>
                            <label class="form-check-label" for="pos_volante">
                                Volante
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="posicion" id="pos_delantero" value="Delantero" @if($jugador->posicion=='Delantero') checked @endif>
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
                            <option value="{{$equipo->id}}" @if($jugador->equipo_id==$equipo->id) selected @endif>{{$equipo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- botones --}}
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Cancelar</button>
                        <button class="btn btn-success" type="submit">Editar Jugador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
