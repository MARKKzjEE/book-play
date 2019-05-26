<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pista extends Model
{
    public $timestamps = false;
    public function reservas(){
        return $this->hasMany("App\Reserva");
    }
    public function deporte(){
        return $this->hasOne('App\Deporte');
    }
    public function establecimiento(){
        return $this->belongsTo('App\Establecimiento', 'id_club', 'id');
    }

    public static function getAllPistas(){
        return Pista::select('id','nombre','id_club','id_deporte')->distinct()->get();
    }

    public static function deleteField($id){
        DB::table('pista')
            ->where('id',$id)->delete();
    }

    public static function datospista($id){
        return DB::table('pista')
            ->select('pista.nombre as nombrepista', 'pista.id as id_pista')
            ->join('establecimiento', 'pista.id_club', '=', 'establecimiento.id')
            ->where('establecimiento.id', '=', $id)
            ->orderBy('pista.id', 'asc')
            ->get();
    }

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

    public static function getpreciopista($idpista){
        return DB::table('pista')
            ->select('pista.precio as preciopista')
            ->where('pista.id', '=', $idpista)
            ->get();
    }
    protected $table ='pista';
}
