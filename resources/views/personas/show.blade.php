@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Detalles de la Persona
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
                    <p><strong>Apellido:</strong> {{ $persona->apellido }}</p>
                    <p><strong>Dirección:</strong> {{ $persona->direccion ?: 'N/A' }}</p>
                    <p><strong>Teléfono:</strong> {{ $persona->telefono ?: 'N/A' }}</p>
                    <p><strong>¿Es administrador?:</strong> {{ $persona->es_admin ? 'Sí' : 'No' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection