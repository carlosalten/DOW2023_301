@extends('templates.master')

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col-8">
        <h3>Jugadores</h3>
        <p>Lista de todos los jugadores ingresados</p>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end">
        <a href="{{route('jugadores.create')}}" class="btn btn-success">Agregar Jugador</a>
    </div>
</div>

{{-- tabla --}}
<div class="row">
    <div class="col">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>RUT</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Camiseta</th>
                    <th>Posición</th>
                    <th>Equipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugadores as $index => $jugador)
                <tr>
                    <td class="align-middle">{{$index+1}}</td>
                    <td class="align-middle">{{$jugador->rut}}</td>
                    <td class="align-middle">{{$jugador->apellido}}</td>
                    <td class="align-middle">{{$jugador->nombre}}</td>
                    <td class="align-middle">{{$jugador->numero_camiseta}}</td>
                    <td class="align-middle">{{$jugador->posicion}}</td>
                    <td class="align-middle">{{$jugador->equipo->nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- volver --}}
<div class="row">
    <div class="col text-end">
        <a href="#" class="btn btn-warning">Volver a Equipos</a>
    </div>
</div>
@endsection
