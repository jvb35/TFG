<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    public function mascota(){
        return $this->belongsTo('App\Mascota');
    }

    public function consultas() {
        return $this->hasMany('App\Consulta');
    }

}
