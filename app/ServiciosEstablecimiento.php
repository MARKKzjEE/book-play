<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiciosEstablecimiento extends Model
{
    public $timestamps = false;
    /**
     * Devuelve todos los servicios que tiene un club a partir de su id
     *
     * @param int $id identificador de club
     * @return null| array null o array de servicios
     * @author HolgerCastillo
     */
    public static function getAllServicesByClubId($id){
        return ServiciosEstablecimiento::where('id_club',$id)
            ->join('servicio','servicio.id','=','servicios_establecimiento.id_servicio')
            ->get();
    }
    /**
     * Elimina todas las relaciones de club y servicios a
     * partir de la id de club
     *
     * @param int $id identificador de club
     * @return void
     * @author HolgerCastillo
     */
    public static function deleteByServiceId($id){
        DB::table('servicios_establecimiento')
            ->where('id_servicio',$id)->delete();
    }


    protected $table='servicios_establecimiento';
}
