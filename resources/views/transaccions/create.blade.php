@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Crear Transacción</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('transaccions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="cuenta_origen">Cuenta Origen:</label>
                        <input type="text" class="form-control" id="cuenta_origen" name="cuenta_origen" required>
                        <small class="text-danger">@error('cuenta_origen') {{ $message }} @enderror</small>
                    </div>
                    <div class="form-group">
                        <label for="cuenta_destino">Cuenta Destino:</label>
                        <input type="text" class="form-control" id="cuenta_destino" name="cuenta_destino" required>
                        <small class="text-danger">@error('cuenta_destino') {{ $message }} @enderror</small>
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input type="number" class="form-control" id="monto" name="monto" required min="0">
                        <small class="text-danger">@error('monto') {{ $message }} @enderror</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
