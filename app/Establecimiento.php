<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{

    public function servicios(){
        return $this->belongsToMany("App\Servicio");
    }
    public function deportes(){
        return $this->belongsToMany("App\Deporte");
    }
    public function galeria(){
        return $this->hasOne('App\Galeria');
    }
    protected $table='establecimiento';
}
