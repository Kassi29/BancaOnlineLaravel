@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de Personas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped" style="background-color: #f0f7ff;">
                    <thead>
                        <tr style="background-color: #cce5ff;">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>ID</th>
                            <th>Acciones</th> <!-- Nueva columna para acciones -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personas as $persona)
                            <tr>
                                <td>{{ $persona->nombre }}</td>
                                <td>{{ $persona->apellido }}</td>
                                <td>{{ $persona->es_admin ? 'Admin' : 'Usuario' }}</td>
                                <td>{{ $persona->idpersona }}</td> 
                                <td>
                                    <!-- Botón para ver detalles -->
                                    <a href="{{ route('personas.show', $persona->idpersona) }}" class="btn btn-info">Ver</a>
                                    <!-- Botón para editar -->
                                    <a href="{{ route('personas.edit', $persona->idpersona) }}" class="btn btn-primary">Editar</a>
                                    <!-- Formulario para eliminar -->
                                    <form action="{{ route('personas.destroy', $persona->idpersona) }}" method="POST" style="display: inline;">
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
                <a href="{{ route('personas.create') }}" class="btn btn-primary">Crear persona</a>
            </div>
        </div>
    </div>
@endsection

