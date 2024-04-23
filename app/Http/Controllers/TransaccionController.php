<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Cuenta;

class TransaccionController extends Controller
{
    public function index()
    {
        $transaccions = Transaccion::all();
        return view('transaccions.index', compact('transaccions'));
    }

    public function create()
    {
        return view('transaccions.create');
    }

    public function store(Request $request)
{
    // Validar los datos de la transacción
    $validatedData = $request->validate([
        'cuenta_origen' => 'required|exists:cuentas,idcuenta',
        'cuenta_destino' => 'required|exists:cuentas,idcuenta|different:cuenta_origen',
        'monto' => 'required|numeric|min:0',
        'fecha' => 'nullable|date'
    ]);

    // Obtener las cuentas origen y destino
    $cuentaOrigen = Cuenta::findOrFail($validatedData['cuenta_origen']);
    $cuentaDestino = Cuenta::findOrFail($validatedData['cuenta_destino']);

    // Verificar que la cuenta de origen tenga suficiente saldo
    if ($cuentaOrigen->saldo < $validatedData['monto']) {
        return redirect()->back()->withErrors(['monto' => 'La cuenta de origen no tiene suficiente saldo para realizar la transacción.'])->withInput();
    }

    // Actualizar el saldo de las cuentas
    $saldoOrigenAnterior = $cuentaOrigen->saldo;
    $saldoDestinoAnterior = $cuentaDestino->saldo;

    $cuentaOrigen->saldo = $saldoOrigenAnterior - $validatedData['monto'];
    $cuentaDestino->saldo = $saldoDestinoAnterior + $validatedData['monto'];

    // Guardar los cambios en las cuentas
    $cuentaOrigen->save();
    $cuentaDestino->save();

    // Crear la transacción
    Transaccion::create($validatedData);

    return redirect()->route('transaccions.index')->with('success', 'Transacción creada exitosamente.');
}



    public function show($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        return view('transaccions.show', compact('transaccion'));
    }

    public function edit($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        return view('transaccions.edit', compact('transaccion'));
    }

   public function update(Request $request, $id)
{
    // Validar los datos de la transacción
    $validatedData = $request->validate([
        'cuenta_origen' => 'required|exists:cuentas,idcuenta',
        'cuenta_destino' => 'required|exists:cuentas,idcuenta|different:cuenta_origen',
        'monto' => 'required|numeric|min:0',
        'fecha' => 'nullable|date'
    ]);

    // Verificar que la cuenta de origen tenga suficiente saldo
    $cuentaOrigen = Cuenta::findOrFail($validatedData['cuenta_origen']);
    if ($cuentaOrigen->saldo < $validatedData['monto']) {
        return redirect()->back()->withErrors(['monto' => 'La cuenta de origen no tiene suficiente saldo para realizar la transacción.'])->withInput();
    }

    // Actualizar la transacción
    $transaccion = Transaccion::findOrFail($id);
    $transaccion->fill($validatedData);
    $transaccion->save();

    return redirect()->route('transaccions.index')->with('success', 'Transacción actualizada exitosamente.');
}


    public function destroy($id)
    {
        try {
            Transaccion::findOrFail($id)->delete();
            return redirect()->route('transaccions.index')->with('success', 'Transacción eliminada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('transaccions.index')->with('error', 'Error al eliminar la transacción.');
        }
    }

    private function validateTransaccion(Request $request)
    {
        return $request->validate([
            'cuenta_origen' => 'required|exists:cuentas,idcuenta',
            'cuenta_destino' => 'required|exists:cuentas,idcuenta|different:cuenta_origen',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'nullable|date'
        ], [
            'cuenta_destino.different' => 'La cuenta destino debe ser diferente a la cuenta origen.',
            'monto.min' => 'El monto debe ser mayor que cero.'
        ]);
    }
}
