<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_file extends Model
{

    protected $table = 'category_files';
    protected $fillable = [
        'nivel', 'nombre', 'id_categoria_referencia','detalle','activo'
    ];


    public function client(){   //cliente es como un perfil
        return $this->hasOne(Client::class);
    }
}
