<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['nombre_mascota', 'tipo_consulta', 'propietario', 'telefono', 'color', 'start_date', 'end_date'];
}
