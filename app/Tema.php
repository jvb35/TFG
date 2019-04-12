<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    public function personal() {
        return $this->belongsTo('App\Personal');
    }

    public function foro() {
        return $this->hasMany('App\Foro');
    }
}
