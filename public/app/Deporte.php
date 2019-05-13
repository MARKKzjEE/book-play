<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Deporte extends Authenticatable
{
    use Notifiable;

    public function establecimientos(){
        return $this->belongsToMany("App\Establecimiento");
    }
}
