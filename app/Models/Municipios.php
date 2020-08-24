<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';
    protected $fillable = [
        'municipio',
        'departamentos_id'
    ];

    public function departamento(){
        return $this->belongsTo('App\Models\Departamentos', 'departamentos_id');
    }

}
