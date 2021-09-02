<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'id_cliente';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id_cliente','razon_social','domicilio','localidad','cp','provincia','telefono','email','contacto','bonificacion','zona','vendedor','CUIT','id_lista','lista','pago','saldo','limite_credito','observacion'
    ];
}
