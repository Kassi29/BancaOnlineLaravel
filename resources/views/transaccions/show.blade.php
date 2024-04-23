@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detalles de Transacción</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Transacción ID: {{ $transaccion->id }}
                    </div>
                    <div class="card-body">
                        <p>Cuenta Origen: {{ $transaccion->cuenta_origen }}</p>
                        <p>Cuenta Destino: {{ $transaccion->cuenta_destino }}</p>
                        <p>Monto: {{ $transaccion->monto }}</p>
                        <p>Fecha: {{ $transaccion->fecha }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
