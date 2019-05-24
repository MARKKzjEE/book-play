<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public $timestamps = false;
    public function establecimientos(){
        return $this->belongsToMany("App\Establecimiento")->using(ServiciosEstablecimiento::class);
    }
    protected $table='servicio';
}
