<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = 'cuentas';

    protected $fillable = [
        'tipo',
        'saldo',
        'fecha_creacion',
        'idcliente',
	'departamento', 
    ];

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'cuenta_origen', 'idcuenta');
    }

    public function propietario()
    {
        return $this->belongsTo(Persona::class, 'idcliente', 'idpersona');
    }

    protected $primaryKey = 'idcuenta';

    // Método para actualizar el saldo de la cuenta
    public function updateSaldo()
    {
        // Calcular el saldo total de las transacciones como cuenta origen
        $saldo_origen = $this->transacciones()->sum('monto');

        // Calcular el saldo total de las transacciones como cuenta destino
        $saldo_destino = Transaccion::where('cuenta_destino', $this->idcuenta)->sum('monto');

        // Actualizar el saldo de la cuenta
        $this->saldo = $saldo_destino - $saldo_origen;
        $this->save();
    }
}
