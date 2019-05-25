<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DeportesEstablecimiento extends Model
{
    public $timestamps = false;
    public static function getAllSportByClubId($id){
        return DeportesEstablecimiento::where('id_club',$id)
        ->join('deporte','deporte.id','=','deportes_establecimiento.id_deporte')
        ->get();
    }

    public static function deleteByClubId($id){
        DB::table('deportes_establecimiento')
            ->where('id_club',$id)->delete();
    }

    public static function deleteBySportId($id){
        DB::table('deportes_establecimiento')
            ->where('id_deporte',$id)->delete();
    }

    protected $table='deportes_establecimiento';
}
