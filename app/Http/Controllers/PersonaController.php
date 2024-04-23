<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'es_admin' => 'boolean'
        ]);

        // Crear una nueva persona
        Persona::create($validatedData);

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'es_admin' => 'boolean'
        ]);

        // Actualizar la persona
        Persona::findOrFail($id)->update($validatedData);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }

   public function destroy($id)
   {
    // Eliminar la persona
    Persona::findOrFail($id)->delete();

    return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
   }



}
