@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Cuenta</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               <form action="{{ route('cuentas.update', $cuenta->idcuenta) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $cuenta->tipo }}" required>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo:</label>
                        <input type="number" class="form-control" id="saldo" name="saldo" value="{{ $cuenta->saldo }}" required min="0">
                    </div>
                    <div class="form-group">
                        <label for="fecha_creacion">Fecha de Creación:</label>
                        <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ $cuenta->fecha_creacion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="idcliente">Propietario:</label>
                        <input type="text" class="form-control" id="idcliente" name="idcliente" value="{{ $cuenta->idcliente }}" required>
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