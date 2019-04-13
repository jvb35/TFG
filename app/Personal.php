<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public function citas() {
        return $this->hasMany('App\Cita');
    }

    public function temas() {
        return $this->hasMany('App\Tema');
    }

    public function consultas() {
        return $this->hasMany('App\Consulta');
    }


}
