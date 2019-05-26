<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public static function getAllClubs(){
        return Establecimiento::select('id', 'nombre', 'direccion')->distinct()->get();
    }

    public static function deleteClub($id){
        DB::table('establecimiento')
            ->where('id',$id)->delete();
    }

    public static function datosestablecimiento($id){
        return DB::table('establecimiento')
            ->select('establecimiento.hora_inicio as hora_inicio', 'establecimiento.hora_final as hora_final')
            ->where('establecimiento.id', '=', $id)
            ->get();
    }

    public static function datosestablecimientoidpista($id){
        return DB::table('establecimiento')
            ->select('establecimiento.hora_final as hora_inicio', 'pista.id as id_pista')
            ->join('pista', 'pista.id_club', '=', 'establecimiento.id')
            ->where('pista.id', '=', $id)
            ->get();
    }
    protected $table='establecimiento';
}
