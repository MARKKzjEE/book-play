<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournaments extends Model
{
    public function establecimiento(){
        return $this->belongsTo('App\Establecimiento', 'id_club', 'id');
    }
    protected $table ='tournaments';

    public static function getAllTournamentsVip(){
        return Tournaments::select('*',
            'tournaments.id as id_tournament',
            'establecimiento.nombre as name_club',
            'establecimiento.id as id_club',
            'tournaments.name as name_tourny',
            'deporte.nombre as name_sport')
            ->join('establecimiento','establecimiento.id','=','tournaments.id')
            ->join('deporte','deporte.id','=','tournaments.id_deporte')
            ->where([
                ['tournaments.prioridad',1],
                ['tournaments.num_participantes_actual','==','tournaments.num_participantes_max']
            ])
            ->get();
    }


}
