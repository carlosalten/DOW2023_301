@php
$estados = [0 => 'Pendiente',1=>'En Juego',2=>'Finalizado'];
@endphp

@inject('carbon','Carbon\Carbon')

@extends('templates.master')

@section('hojas-estilo')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('contenido-principal')
<div class="row">
    <div class="col">
        <h3>Partidos</h3>
    </div>
</div>

<div class="row">
    <!-- tabla -->
    <div class="col-12 col-lg-8 order-last order-lg-first">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partidos as $num=>$partido)
                <tr>
                    <td class="align-middle">{{ $num+1 }}</td>
                    <td class="align-middle">{{ $carbon::parse($partido->fecha)->format('d/m/Y') }}</td>
                    <td class="align-middle">{{ $estados[$partido->estado] }}</td>
                    <td class="align-middle">
                        @if($partido->equipos!=null)
                        {{$partido->equipos->where('pivot.es_local',true)->first()->nombre}}
                        <span class="fw-bold">({{$partido->equipos->where('pivot.es_local',true)->first()->pivot->goles}})</span>
                        @else
                        <span class="fs-italic">Sin equipos</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        @if($partido->equipos!=null)
                        {{$partido->equipos->where('pivot.es_local',false)->first()->nombre}}
                        <span class="fw-bold">({{$partido->equipos->where('pivot.es_local',false)->first()->pivot->goles}})</span>
                        @else
                        <span class="fs-italic">Sin equipos</span>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            {{-- Borrar --}}
                            <div class="col text-end">
                                <form method="POST" action="{{route('partidos.destroy',$partido->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar Partido">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </form>
                            </div>
                            {{-- Editar --}}
                            <div class="col text-center">
                                <a href="{{route('partidos.edit',$partido->id)}}" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Editar Partido">
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
