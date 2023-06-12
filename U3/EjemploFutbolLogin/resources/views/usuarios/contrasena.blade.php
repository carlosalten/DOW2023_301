@extends('templates.master')

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col-8">
        <h3>Cambiar Contraseña</h3>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end">
        <a href="{{route('partidos.index')}}" class="btn btn-warning">Cancelar</a>
    </div>
</div>

{{-- formulario --}}
<div class="col-6">
    <div class="card">
        <div class="card-header bg-dark text-white">Cambiar su contraseña</div>
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
            <form method="POST" action="{{route('usuarios.aplicarcambiarcontrasena')}}">
                @csrf
                {{-- contraseña actual --}}
                <div class="mb-3">
                    <label for="password_actual" class="form-label">Contraseña Actual</label>
                    <input type="password" id="password_actual" name="password_actual" class="form-control">
                </div>
                {{-- contraseña nueva --}}
                <div class="mb-3">
                    <label for="password1" class="form-label">Contraseña Nueva</label>
                    <input type="password" id="password1" name="password1" class="form-control">
                </div>
                {{-- repetir contraseña nueva --}}
                <div class="mb-3">
                    <label for="password2" class="form-label">Repetir Contraseña Nueva</label>
                    <input type="password" id="password2" name="password2" class="form-control">
                </div>


                {{-- botones --}}
                <div class="mb-3 d-grid gap-2 d-lg-block">
                    <button class="btn btn-warning" type="reset">Cancelar</button>
                    <button class="btn btn-success" type="submit">Cambiar Contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
