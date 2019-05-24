<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeportesEstablecimiento extends Model
{
    public $timestamps = false;
    public static function getAllSportByClubId($id){
        return DeportesEstablecimiento::where('id_club',$id)
        ->join('deporte','deporte.id','=','deportes_establecimiento.id_deporte')
        ->get();
    }
    protected $table='deportes_establecimiento';
}
