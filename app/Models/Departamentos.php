<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $table = 'departamentos';
    protected $fillable= [
        'departamento'
    ];

    public function municipio(){
        return $this->hasMany('App\Models\Municipios', 'municipios_id');
    }
}
