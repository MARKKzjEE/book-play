<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Archivo extends Authenticatable
{
    use Notifiable;

    public function galeria(){
        return $this->belongsTo('App\Galeria');
    }
}
