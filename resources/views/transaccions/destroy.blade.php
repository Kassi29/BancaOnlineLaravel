@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Eliminar Transacción</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>¿Estás seguro de que deseas eliminar esta transacción?</p>
                <form action="{{ route('transaccions.destroy', $transaccion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="{{ route('transaccions.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
