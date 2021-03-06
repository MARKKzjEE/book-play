<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pista extends Model
{
    public $timestamps = false;
    /**
     * Devuelve un array con todas las reservas de esta pista,
     * al ser una relacion 1:N con esta función nos ahorramos hacer una
     * consulta para devolverlo
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\HasMany array de reservas
     */
    public function reservas(){
        return $this->hasMany("App\Reserva");
    }
    /**
     * Devuelve un deporte si esta pista tiene creada la relación.
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\HasOne devuelve un objeto de la clase deporte
     */
    public function deporte(){
        return $this->hasOne('App\Deporte');
    }

    /**
     * Función que devuelve el establecimiento relacionado con esta pista
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo devuelve un objeto de la clase club
     */
    public function establecimiento(){
        return $this->belongsTo('App\Establecimiento', 'id_club', 'id');
    }
    /**
     * Devuelve todas las pistas en formato id,nombre,id_club,id_deporte
     *
     * @author HolgerCastillo
     * @return array array de pistas
     */
    public static function getAllPistas(){
        return Pista::select('id','nombre','id_club','id_deporte')->distinct()->get();
    }
    /**
     * Elimina una pista a partir del identificador $id
     * @param int $id identificador de pista
     * @return void
     * @author HolgerCastillo
     */
    public static function deleteField($id){
        DB::table('pista')
            ->where('id',$id)->delete();
    }
    /**
     * Funcion que devuelve el nombre y identificador de la pista con
     * el id del club indicado por parametro
     *
     * @param int $id identificador del club
     * @return array de pistas
     * @author HolgerCastillo
     */
    public static function datospista($id){
        return DB::table('pista')
            ->select('pista.nombre as nombrepista', 'pista.id as id_pista')
            ->join('establecimiento', 'pista.id_club', '=', 'establecimiento.id')
            ->where('establecimiento.id', '=', $id)
            ->orderBy('pista.id', 'asc')
            ->get();
    }
    /**
     * Funcion que devuelve el nombre y identificador de la pista con
     * el id del club indicado por parametro
     * Además, dependiendo de los parametros indicados, se filtra por
     * cercamiento,pared, deporte y fecha
     *
     * @param int $id identificador del club
     * @param string $superficie superficie de la pista
     * @param string $cercamiento cercamiento de la pista
     * @param string $pared pared de la pista
     * @return array de pistas
     * @author HolgerCastillo
     */
    public static function datospistafilter( $superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        $filter = DB::table('pista')
            ->select('pista.nombre as nombrepista', 'pista.id as id_pista')
            ->join('establecimiento', 'pista.id_club', '=', 'establecimiento.id')
            ->where('establecimiento.id', '=', $id);
        if ($superficie != -1) {
            $filter->where('pista.superficie', '=', $superficie);
        }
        if ($cercamiento != -1) {
            $filter->where('pista.cerramiento', '=', $cercamiento);
        }
        if ($pared != -1) {
            $filter->where('pista.pared', '=', $pared);
        }
        if ($deporte != -1) {
            $filter->where('pista.id_deporte', '=', $deporte);
        }
        $filter->orderBy('pista.id', 'asc');
        $result = $filter->get();
        return $result;
    }

    /**
     * Funcion que devuelve el precio de la pista a partir de
     * su identificador
     * @param $idpista int identificador de la pista
     * @return mixed
     */
    public static function getpreciopista($idpista){
        return DB::table('pista')
            ->select('pista.precio as preciopista')
            ->where('pista.id', '=', $idpista)
            ->get();
    }
    protected $table ='pista';
}
