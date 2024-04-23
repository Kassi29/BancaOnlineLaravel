 
@extends('layouts.app')

@section('content')
    <h1>Crear Persona</h1>
    <form action="{{ route('personas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="form-group">
            <label for="es_admin">¿Es administrador?</label>
            <input type="checkbox" id="es_admin" name="es_admin" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
