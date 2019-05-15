<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{

    public function reservas(){
        return $this->hasMany("App\Reserva");
    }
    public function deporte(){
        return $this->hasOne('App\Deporte');
    }
    public function establecimiento(){
        return $this->belongsTo('App\Establecimiento', 'id_club', 'id');
    }
    protected $table ='pista';
}
