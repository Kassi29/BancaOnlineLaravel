<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas'; // Especifica el nombre de la tabla si es diferente del nombre del modelo

    protected $fillable = ['nombre', 'apellido', 'direccion', 'telefono', 'es_admin']; // Campos permitidos para asignación masiva
 
    protected $primaryKey = 'idpersona'; // Especifica el nombre de la clave primaria

    // Define la relación hasMany con el modelo Cuenta
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class, 'idcliente', 'idpersona');
    }
}
