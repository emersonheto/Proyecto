<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'ruc', 'razonsocial', 'bandera','direccion','grupo','direccion','contrato','activo'
    ];
    
}
