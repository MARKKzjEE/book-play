<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Galeria extends Authenticatable
{
    use Notifiable;

    public function imagenes(){
        return $this->hasMany("App\Archivo");
    }
}
