<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiciosEstablecimiento extends Model
{
    public $timestamps = false;
    public static function getAllServicesByClubId($id){
        return ServiciosEstablecimiento::where('id_club',$id)
            ->join('servicio','servicio.id','=','servicios_establecimiento.id_servicio')
            ->get();
    }

    public static function deleteByServiceId($id){
        DB::table('servicios_establecimiento')
            ->where('id_servicio',$id)->delete();
    }


    protected $table='servicios_establecimiento';
}
