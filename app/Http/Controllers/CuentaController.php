<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Persona;

class CuentaController extends Controller
{
    public function index()
    {
        $cuentas = Cuenta::all();
        return view('cuentas.index', compact('cuentas'));
    }

    public function create()
    {
        return view('cuentas.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'tipo' => 'required',
            'saldo' => 'required|numeric|min:0',
            'fecha_creacion' => 'required|date',
            'idcliente' => 'required|exists:personas,idpersona'
        ]);

        // Agregar el valor del campo 'departamento'
        $validatedData['departamento'] = $request->input('departamento');

        // Crear una nueva cuenta
        Cuenta::create($validatedData);

        return redirect()->route('cuentas.index')->with('success', 'Cuenta creada exitosamente.');
    }

    public function show($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        return view('cuentas.show', compact('cuenta'));
    }

    public function edit($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        return view('cuentas.edit', compact('cuenta'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'tipo' => 'required',
            'saldo' => 'required|numeric|min:0',
            'fecha_creacion' => 'required|date',
            'idcliente' => 'required|exists:personas,idpersona'
        ]);

        // Agregar el valor del campo 'departamento'
        $validatedData['departamento'] = $request->input('departamento');

        // Actualizar la cuenta
        Cuenta::findOrFail($id)->update($validatedData);

        return redirect()->route('cuentas.index')->with('success', 'Cuenta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        // Eliminar la cuenta
        Cuenta::findOrFail($id)->delete();

        return redirect()->route('cuentas.index')->with('success', 'Cuenta eliminada exitosamente.');
    }
}

