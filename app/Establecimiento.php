<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    public $timestamps = false;

    public function servicios(){
        return $this->belongsToMany("App\Servicio")->using(ServiciosEstablecimiento::class);
    }
    public function deportes(){
        return $this->belongsToMany("App\Deporte")->using(DeportesEstablecimiento::class);
    }
    public function pistas(){
        return $this->hasMany('App\Pista', 'id_club','id');
    }
    public function galeria(){
        return $this->hasOne('App\Galeria');
    }

    public static function getAllClubsVip(){
        return Establecimiento::where('prioridad','1')->get();
    }

    public static function getClubById($id){
        return Establecimiento::where('id', $id)->firstOrFail();
    }
    protected $table='establecimiento';
}
