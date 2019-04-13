<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    public function personal() {
        return $this->belongsTo('App\Personal');
    }

    public function historial() {
        return $this->belongsTo('App\Historial');
    }

}
