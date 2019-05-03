<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = ['nombre_mascota', 'tipo_consulta', 'propietario', 'telefono', 'color', 'inicio_consulta', 'fin_consulta'];

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

    public function mascota() {
        return $this->belongsTo('App\Mascota');
    }

    public function personal() {
        return $this->belongsTo('App\Personal');
    }

}
