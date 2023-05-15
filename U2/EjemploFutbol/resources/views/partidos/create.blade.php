@extends('templates.master')

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col-8">
        <h3>Agregar Partido</h3>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end">
        <a href="{{route('partidos.index')}}" class="btn btn-warning">Cancelar</a>
    </div>
</div>

{{-- formulario --}}
<div class="col-6">
    <div class="card">
        <div class="card-header bg-dark text-white">Crear un nuevo partido</div>
        <div class="card-body">
            <form method="POST" action="{{route('partidos.store')}}">
                @csrf
                {{-- fecha del partido --}}
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" id="fecha" name="fecha" class="form-control">
                </div>
                {{-- estado del partido --}}
                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado_pendiente" value="0" checked>
                        <label class="form-check-label" for="estado_pendiente">
                            Pendiente
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado_en_juego" value="1">
                        <label class="form-check-label" for="estado_en_juego">
                            En Juego
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="estado_finalizado" value="2">
                        <label class="form-check-label" for="estado_finalizado">
                            Finalizado
                        </label>
                    </div>
                </div>
                {{-- equipo local --}}
                <div class="mb-3">
                    <label class="form-label" for="equipo_local">Equipo Local</label>
                    <select id="equipo_local" name="equipo_local" class="form-control">
                        @foreach($equipos as $equipo)
                        <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- equipo visita --}}
                <div class="mb-3">
                    <label class="form-label" for="equipo_visita">Equipo Visita</label>
                    <select id="equipo_visita" name="equipo_visita" class="form-control">
                        @foreach($equipos as $equipo)
                        <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- botones --}}
                <div class="mb-3 d-grid gap-2 d-lg-block">
                    <button class="btn btn-warning" type="reset">Cancelar</button>
                    <button class="btn btn-success" type="submit">Agregar Partido</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
