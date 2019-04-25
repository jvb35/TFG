<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    public function foros() {
        return $this->hasMany('App\Foro');
    }
}
