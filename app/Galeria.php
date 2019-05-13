<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{

    public function imagenes(){
        return $this->hasMany("App\Archivo");
    }
    protected $table='galeria';
}
