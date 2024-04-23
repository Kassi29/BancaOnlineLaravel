@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Transacciones</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cuenta Origen</th>
                            <th>Cuenta Destino</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaccions as $transaccion)
                            <tr>
                                <td>{{ $transaccion->id }}</td>
                                <td>{{ $transaccion->cuenta_origen }}</td>
                                <td>{{ $transaccion->cuenta_destino }}</td>
                                <td>{{ $transaccion->monto }}</td>
                                <td>{{ $transaccion->fecha }}</td>
                                <td>
    <a href="{{ route('transaccions.show', $transaccion->idtransaccion) }}" class="btn btn-info">Ver</a>
    <a href="{{ route('transaccions.edit', $transaccion->idtransaccion) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('transaccions.destroy', $transaccion->idtransaccion) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('transaccions.create') }}" class="btn btn-primary">Crear Transacción</a>
            </div>
        </div>
    </div>
@endsection
