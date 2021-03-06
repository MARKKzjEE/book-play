<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reserva extends Model
{
    public $timestamps = false;
    /**
     * Función que devuelve el usuario que hace esta reserva
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo devuelve un objeto de la clase usuario
     */
    public function usuario(){
        return $this->belongsTo('App\User');
    }
    /**
     * Función que devuelve la pista a la que pertenece esta reserva
     *
     * @author ismaelsanchezf
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo devuelve un objeto de la clase pista
     */
    public function pista(){
        return $this->belongsTo('App\Pista');
    }
    /**
     * Función que devuelve las reservas que coinciden con los
     * diferentees parametros disponibles
     * @param $superficie string superficie de la pista
     * @param $cercamiento string cercamieto de la pista
     * @param $pared string pared de la pista
     * @param $deporte int identificador del deporte
     * @param $fecha string fecha indicada de la reserva
     * @param $id int identificador del club
     * @author HolgerCastillo
     * @return array devuelve un objeto de la clase pista
     */
    public static function datosreservafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        $filter = DB::table('reserva')
            ->select('reserva.hora_inicio as hora_inicio','reserva.hora_final as hora_final', 'reserva.id_pista as id_pista', 'pista.nombre as nombrepista', 'establecimiento.nombre as nombreestablecimiento')
            ->join('pista', 'reserva.id_pista', '=', 'pista.id')
            ->join('establecimiento', 'pista.id_club', '=', 'establecimiento.id')
            ->where('establecimiento.id', '=', $id)
            ->where('reserva.fecha_reserva', '=', $fecha);
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
        $filter->orderBy('reserva.id_pista', 'asc');
        $filter = $filter->get();

        return $filter;
    }
    /**
     * Función que devuelve las reservas que coinciden con los
     * diferentees parametros disponibles
     * Devuelve las reservas con formato hora_inicio,hora_final,id_pista,nombre_pista
     *  y nombre de club
     * @param $today string fecha de la reserva
     * @param $id int identificador del club
     * @author HolgerCastillo
     * @return array devuelve un objeto de la clase pista
     */
    public static function datosreserva($id,$today){
        return DB::table('reserva')
            ->select('reserva.hora_inicio as hora_inicio','reserva.hora_final as hora_final', 'reserva.id_pista as id_pista', 'pista.nombre as nombrepista', 'establecimiento.nombre as nombreestablecimiento')
            ->join('pista', 'reserva.id_pista', '=', 'pista.id')
            ->join('establecimiento', 'pista.id_club', '=', 'establecimiento.id')
            ->where('establecimiento.id', '=', $id)
            ->where('reserva.fecha_reserva', '=', $today)
            ->orderBy('reserva.id_pista', 'asc')
            ->get();
    }
    /**
     * Función que devuelve las reservas que coinciden con los
     * diferentees parametros disponibles
     * Busca reservas que empiecen mas tarde de la fecha indicada
     * @param $fecha_total string hora de la reserva
     * @param $dia string dia de la reserva
     * @param $id_pista int identificador de pista
     * @author HolgerCastillo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo devuelve un objeto de la clase pista
     */
    public static function timenextbook($id_pista, $fecha_total, $dia){
        return DB::table('reserva')
            ->select('reserva.hora_inicio as hora_inicio', 'reserva.id_pista as id_pista')
            ->where('reserva.id_pista', '=', $id_pista)
            ->where('reserva.hora_inicio', '>', $fecha_total)
            ->where('reserva.fecha_reserva', '=', $dia)
            ->orderBy('reserva.hora_inicio', 'asc')
            ->get();
    }

    /**
     * Elimina la reserva que coincida con el identificador
     * indicado
     * @param $idbook int id de la reserva
     */
    public static function deletebook($idbook, $idprofile) {


        $query = DB::table('reserva')->where('id',$idbook);
        $query->delete();

    }
    protected $table='reserva';
}
