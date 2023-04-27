@extends('templates.master')

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col-8">
        <h3>Nombre Equipo: Lista de Jugadores</h3>
        <span class="fw-bold">Cantidad de Jugadores: </span>
        <XXX>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end">
        <a href="#" class="btn btn-success">Agregar Jugador</a>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">rut</td>
                    <td class="align-middle">apellido</td>
                    <td class="align-middle">nombre</td>
                    <td class="align-middle">numero camiseta</td>
                    <td class="align-middle">posicion</td>
                </tr>
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
