<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
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
