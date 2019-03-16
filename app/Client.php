<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'ruc', 'razonsocial', 'bandera','direccion','grupo','direccion','contrato','activo'
    ];


    public function client(){   //cliente es como un perfil
        return $this->hasOne(Client::class);
    }
    
}
