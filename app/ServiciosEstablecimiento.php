<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiciosEstablecimiento extends Model
{
    public $timestamps = false;
    public static function getAllServicesByClubId($id){
        return ServiciosEstablecimiento::where('id_club',$id)
            ->join('servicio','servicio.id','=','servicios_establecimiento.id_servicio')
            ->get();
    }
    protected $table='servicios_establecimiento';
}
