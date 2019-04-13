<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    public function consultas() {
        return $this->hasMany('App\Consulta');
    }

    public function mascota(){
        return $this->belongsTo('App\Mascota');
    }

}
