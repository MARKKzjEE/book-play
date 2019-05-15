<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public function usuario(){
        return $this->belongsTo('App\User');
    }
    public function pista(){
        return $this->belongsTo('App\Pista');
    }
    protected $table='reserva';
}
