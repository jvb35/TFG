<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    public function foro() {
        return $this->belongsTo('App\Foro');
    }
}
