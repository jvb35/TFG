<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function mascota(){
        return $this->hasMany('App\Mascota');
    }

    public function citas() {
        return $this->hasMany('App\Cita');
    }
}
