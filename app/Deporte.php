<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{

    public function establecimientos(){
        return $this->belongsToMany("App\Establecimiento")->using(DeportesEstablecimiento::class);
    }
    protected $table='deporte';
}
