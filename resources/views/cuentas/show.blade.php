@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detalles de la Cuenta</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Tipo de Cuenta:</strong> {{ $cuenta->tipo }}</p>
                        <p><strong>Saldo:</strong> {{ $cuenta->saldo }}</p>
                        <p><strong>Fecha de Creación:</strong> {{ $cuenta->fecha_creacion }}</p>
                        <p><strong>Departamento:</strong> {{ $cuenta->departamento }}</p> <!-- Agregar esta línea -->
                        <p><strong>Propietario:</strong> {{ $cuenta->propietario->nombre }} {{ $cuenta->propietario->apellido }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="{{ route('cuentas.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection