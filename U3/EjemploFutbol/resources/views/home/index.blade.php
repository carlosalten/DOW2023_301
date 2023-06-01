@extends('templates.master')

@section('contenido-principal')
<div class="row mt-2">
    <div class="col">
        <h3>Sistema de Campeonato de Fútbol</h3>
    </div>
</div>

<div class="row">
    <!-- equipos -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div class="card">
            <img src="{{asset('images/equipos.jpg')}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Equipos</h5>
                <div class="btn-group d-flex justify-content-center">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- estadios -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div class="card">
            <img src="{{asset('images/estadio.jpg')}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Estadios</h5>
                <div class="btn-group d-flex justify-content-center">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- estadísticas -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div class="card">
            <img src="{{asset('images/estadisticas.jpg')}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Estadísticas</h5>
                <div class="btn-group d-flex justify-content-center">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jugadores -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div class="card">
            <img src="{{asset('images/jugadores.jpg')}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Jugadores</h5>
                <div class="btn-group d-flex justify-content-center">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- partidos -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div class="card">
            <img src="{{asset('images/partido.jpg')}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Partidos</h5>
                <div class="btn-group d-flex justify-content-center">
                    <button class="btn btn-outline-success">Ver</button>
                    <button class="btn btn-outline-success">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- configuración -->
    <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div class="card">
            <img src="{{asset('images/configuracion.jpg')}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Configuración</h5>
                <div class="btn-group d-flex justify-content-center">
                    <button class="btn btn-outline-success">Ver</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
