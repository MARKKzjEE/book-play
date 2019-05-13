<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reserva extends Authenticatable
{
    use Notifiable;

    public function usuario(){
        return $this->belongsTo('App\User');
    }
    public function pista(){
        return $this->belongsTo('App\Pista');
    }
}
