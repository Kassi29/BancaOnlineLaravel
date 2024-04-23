 
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Editar Persona
                </div>
                <div class="card-body">
                    <form action="{{ route('personas.update', $persona->idpersona) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $persona->nombre }}">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $persona->apellido }}">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $persona->direccion }}">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $persona->telefono }}">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="es_admin" name="es_admin" {{ $persona->es_admin ? 'checked' : '' }}>
                            <label class="form-check-label" for="es_admin">¿Es administrador?</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
