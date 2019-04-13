<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    public function temas() {
        return $this->belongsTo('App\Tema');
    }

}
