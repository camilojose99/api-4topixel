<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'tipo_identificacion',
        'identificacion',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'direccion',
        'telefono',
        'email',
        'ocupacion',
        'departamentos_id',
        'municipios_id'
    ];

    public function departamento(){
        return $this->hasOne('App\Models\Departamentos', 'departamentos_id');
    }
    public function municipio(){
        return $this->hasOne('App\Models\Municipios', 'municipios_id');
    }

}
