@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Crear Cuenta</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('cuentas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tipo">Tipo de Cuenta:</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                            <option value="Ahorro">Ahorro</option>
                            <option value="Corriente">Corriente</option>
                            <option value="Plazo Fijo">Plazo Fijo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo:</label>
                        <input type="number" class="form-control" id="saldo" name="saldo" required min="0">
                        @error('saldo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_creacion">Fecha de Creación:</label>
                        <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
                        @error('fecha_creacion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="idcliente">ID del Cliente:</label>
                        <input type="number" class="form-control" id="idcliente" name="idcliente" required min="1">
                        @error('idcliente')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento:</label>
                        <select class="form-control" id="departamento" name="departamento" required>
                            <option value="La Paz">La Paz</option>
                            <option value="Cochabamba">Cochabamba</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
