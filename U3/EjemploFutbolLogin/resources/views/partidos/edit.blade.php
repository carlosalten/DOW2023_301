@inject('carbon','Carbon\Carbon')
@extends('templates.master')

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col-8">
        <h3>Editar Partido</h3>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end">
        <a href="{{route('partidos.index')}}" class="btn btn-warning">Cancelar</a>
    </div>
</div>

{{-- formulario --}}
<div class="col-6">
    <div class="card">
        <div class="card-header bg-dark text-white">Editando el Partido de la fecha {{$carbon::parse($partido->fecha)->format('d/m/Y')}}</div>
        <div class="card-body">
            <form method="POST" action="{{route('partidos.update',$partido->id)}}">
                @method('put')
                @csrf
                {{-- fecha del partido --}}
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" id="fecha" name="fecha" class="form-control" value="{{$partido->fecha}}">
                </div>
                {{-- estado del partido --}}
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado_pendiente" value="0" @if($partido->estado==0) checked @endif>
                        <label class="form-check-label" for="estado_pendiente">
                            Pendiente
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado_en_juego" value="1" @if($partido->estado==1) checked @endif>
                        <label class="form-check-label" for="estado_en_juego">
                            En Juego
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado_finalizado" value="2" @if($partido->estado==2) checked @endif>
                        <label class="form-check-label" for="estado_finalizado">
                            Finalizado
                        </label>
                    </div>
                </div>
                {{-- equipo local --}}
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="equipo_local">Equipo Local</label>
                        <select id="equipo_local" name="equipo_local" class="form-control">
                            @foreach($equipos as $equipo)
                            <option value="{{$equipo->id}}" @if($equipo->id==$equipoLocal->id) selected @endif>{{$equipo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="goles_local" class="form-label">Goles</label>
                        <input type="number" min="0" max="99" id="goles_local" name="goles_local" class="form-control" value="{{$equipoLocal->pivot->goles}}">
                    </div>
                </div>

                {{-- equipo visita --}}
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="equipo_visita">Equipo Visita</label>
                        <select id="equipo_visita" name="equipo_visita" class="form-control">
                            @foreach($equipos as $equipo)
                            <option value="{{$equipo->id}}" @if($equipo->id==$equipoVisita->id) selected @endif>{{$equipo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="goles_visita" class="form-label">Goles</label>
                        <input type="number" min="0" max="99" id="goles_visita" name="goles_visita" class="form-control" value="{{$equipoVisita->pivot->goles}}">
                    </div>
                </div>

                {{-- botones --}}
                <div class="mb-3 d-grid gap-2 d-lg-block">
                    <button class="btn btn-warning" type="reset">Cancelar</button>
                    <button class="btn btn-success" type="submit">Editar Partido</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
