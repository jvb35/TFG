<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    
    public function historial() {
        return $this->belongsTo('App\Historial');
    }

    public function personal() {
        return $this->belongsTo('App\Personal');
    }
}
