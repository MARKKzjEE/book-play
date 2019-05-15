<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{

    public function servicios(){
        return $this->belongsToMany("App\Servicio")->using(ServiciosEstablecimiento::class);
    }
    public function deportes(){
        return $this->belongsToMany("App\Deporte")->using(DeportesEstablecimiento::class);
    }
    public function galeria(){
        return $this->hasOne('App\Galeria');
    }
    protected $table='establecimiento';
}
