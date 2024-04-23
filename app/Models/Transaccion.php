<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transaccions';
    protected $primaryKey = 'idtransaccion';

    protected $fillable = [
        'cuenta_origen',
        'cuenta_destino',
        'monto',
        'fecha',
    ];

    public function cuentaOrigen()
    {
        return $this->belongsTo(Cuenta::class, 'cuenta_origen', 'idcuenta');
    }

    public function cuentaDestino()
    {
        return $this->belongsTo(Cuenta::class, 'cuenta_destino', 'idcuenta');
    }
     

}
