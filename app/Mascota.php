<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    public function persona(){
        return $this->belongsTo('App\Persona');
    }    
    
    public function citas(){
        return $this->hasMany('App\Cita');
    }  

    public function historial(){
        return $this->hasOne('App\Historial');
    }
}
