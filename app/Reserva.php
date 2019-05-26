<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reserva extends Model
{
    public $timestamps = false;
    public function usuario(){
        return $this->belongsTo('App\User');
    }
    public function pista(){
        return $this->belongsTo('App\Pista');
    }
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

    public static function timenextbook($id_pista, $fecha_total, $dia){
        return DB::table('reserva')
            ->select('reserva.hora_inicio as hora_inicio', 'reserva.id_pista as id_pista')
            ->where('reserva.id_pista', '=', $id_pista)
            ->where('reserva.hora_inicio', '>', $fecha_total)
            ->where('reserva.fecha_reserva', '=', $dia)
            ->orderBy('reserva.hora_inicio', 'asc')
            ->get();
    }

    public static function deletebook($idbook, $idprofile) {


        $query = DB::table('reserva')->where('id',$idbook);
        $query->delete();

    }
    protected $table='reserva';
}
