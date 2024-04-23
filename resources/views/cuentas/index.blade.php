@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Cuentas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Saldo</th>
                            <th>Propietario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cuentas as $cuenta)
                            <tr>
                                <td>{{ $cuenta->idcuenta }}</td>
                                <td>{{ $cuenta->tipo }}</td>
                                <td>{{ $cuenta->saldo }}</td>
                                <td>{{ $cuenta->propietario->nombre }} {{ $cuenta->propietario->apellido }}</td>
                                <td>
                                    <a href="{{ route('cuentas.show', $cuenta->idcuenta) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('cuentas.edit', $cuenta->idcuenta) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('cuentas.destroy', $cuenta->idcuenta) }}" method="POST" style="display: inline;">
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
                <a href="{{ route('cuentas.create') }}" class="btn btn-primary">Crear Cuenta</a>
            </div>
        </div>
    </div>
@endsection
