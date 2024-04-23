@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Confirmar eliminación</h1>
                <p>¿Estás seguro de que deseas eliminar este registro?</p>
                <form action="{{ route('cuentas.destroy', $cuenta->idcuenta) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="{{ route('cuentas.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
 
