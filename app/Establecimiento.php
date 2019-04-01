<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Establecimiento extends Authenticatable
{
    use Notifiable;

    public function servicios(){
        return $this->belongsToMany("App\Servicio");
    }
    public function deportes(){
        return $this->belongsToMany("App\Deporte");
    }
    public function galeria(){
        return $this->hasOne('App\Galeria');
    }
}
