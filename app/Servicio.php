<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    public function establecimientos(){
        return $this->belongsToMany("App\Establecimiento");
    }
    protected $table='servicio';
}
