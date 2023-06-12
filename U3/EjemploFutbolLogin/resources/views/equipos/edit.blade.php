@extends('templates.master')

@section('contenido-principal')
<div class="row mt-2">
    <div class="col-8">
        <h3>Editar Equipo</h3>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header bg-dark text-white">Editar el equipo {{$equipo->nombre}}</div>
            <div class="card-body">
                <form method="POST" action="{{route('equipos.update',$equipo->id)}}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{$equipo->nombre}}">
                    </div>
                    <div class="mb-3">
                        <label for="entrenador" class="form-label">Entrenador</label>
                        <input type="text" id="entrenador" name="entrenador" class="form-control" value="{{$equipo->entrenador}}">
                    </div>
                    <div class="mb-3 d-grid gap-2 d-lg-block">
                        <button class="btn btn-warning" type="reset">Cancelar</button>
                        <button class="btn btn-success" type="submit">Editar Equipo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
