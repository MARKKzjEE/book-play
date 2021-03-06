<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Establecimiento extends Model
{
    public $timestamps = false;
    /**
    * Devuelve un array con todos los servicios de este club,
    * al ser una relacion N:N con esta función nos ahorramos hacer una
    * consulta para devolverlo
    *
    * @author ismaelsanchezf
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany array de servicios
    */
    public function servicios(){
        return $this->belongsToMany("App\Servicio")->using(ServiciosEstablecimiento::class);
    }
    /**
     * Devuelve un array con todos los deportes de este club,
     * al ser una relacion N:N con esta función nos ahorramos hacer una
     * consulta para devolverlo
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany array de deportes
     */
    public function deportes(){
        return $this->belongsToMany("App\Deporte")->using(DeportesEstablecimiento::class);
    }

    /**
     * Devuelve un array con todas las pistas de este club,
     * al ser una relacion 1:N con esta función nos ahorramos hacer una
     * consulta para devolverlo
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\HasMany array de pistas
     */
    public function pistas(){
        return $this->hasMany('App\Pista', 'id_club','id');
    }

    /**
     * Devuelve la galeria si esta relacionada con este club
     * Devuelve una galeria si este club tiene creada la relación.
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\HasOne devuelve un objeto de la clase galeria
     */
    public function galeria(){
        return $this->hasOne('App\Galeria');
    }
    /**
     * Devuelve todos los clubs vip
     * Devuelve un array con todos los clubs con prioridad 1
     *
     * @author HolgerCastillo
     * @return array array con los clubs
     */
    public static function getAllClubsVip(){
        return Establecimiento::where('prioridad','1')->get();
    }
    /**
     * Devuelve un club a partir de su identificador
     * Devuelve un club si esta id existe, si no salta error
     *
     * @author HolgerCastillo
     * @return Establecimiento devuelve un club
     */
    public static function getClubById($id){
        return Establecimiento::where('id', $id)->firstOrFail();
    }
    /**
     * Devuelve todos los clubs en formato id,nombre,direccion
     *
     * @author HolgerCastillo
     * @return array array de establecimientos
     */
    public static function getAllClubs(){
        return Establecimiento::select('id', 'nombre', 'direccion')->distinct()->get();
    }
    /**
     * Elimina un club a partir del identificador $id
     * @param int $id identificador del club
     * @return void
     * @author HolgerCastillo
     */
    public static function deleteClub($id){
        DB::table('establecimiento')
            ->where('id',$id)->delete();
    }
    /**
     * Funcion que devuelve la hora de inicio y final de un club con
     * el id indicada por parametro
     *
     * @param int $id identificador del club
     * @return array de establecimientos
     * @author HolgerCastillo
     */
    public static function datosestablecimiento($id){
        return DB::table('establecimiento')
            ->select('establecimiento.hora_inicio as hora_inicio', 'establecimiento.hora_final as hora_final')
            ->where('establecimiento.id', '=', $id)
            ->get();
    }
    /**
     * Función que devuelve la hora de inicio y final de un club con
     * el id indicada por parametro, además del identificador de las pistas
     * que estan relacionadas con este club
     *
     * @param int $id identificador del club
     * @return array de establecimientos
     * @author HolgerCastillo
     */
    public static function datosestablecimientoidpista($id){
        return DB::table('establecimiento')
            ->select('establecimiento.hora_final as hora_inicio', 'pista.id as id_pista')
            ->join('pista', 'pista.id_club', '=', 'establecimiento.id')
            ->where('pista.id', '=', $id)
            ->get();
    }
    protected $table='establecimiento';
}
