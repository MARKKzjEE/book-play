<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pista extends Authenticatable
{
    use Notifiable;

    public function reservas(){
        return $this->hasMany("App\Reserva");
    }
    public function deporte(){
        return $this->hasOne('App\Deporte');
    }
}
