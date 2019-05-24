<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tournaments extends Model
{
    public $timestamps = false;
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

    public static function findTournaments($city,$gender,$sport,$date){
        return Tournaments::select('*','tournaments.id as id_tourny')
            ->join('establecimiento','establecimiento.id','=','tournaments.id_club')
            ->where('establecimiento.direccion','LIKE','%' . $city . '%')
            ->where([
                ['genero', '=', $gender],
                ['id_deporte', '=', $sport],
                ['fecha', '>=' , $date]
            ])
            ->get();
    }

    public static function incrementParticipantsInATournament($idTournament,$numPlayers){
        DB::table('tournaments')
            ->where('id',$idTournament)
            ->increment('num_participantes_actual', $numPlayers);
    }

    public static function signUpForATournament($idTournament,$numPlayers,$idUser){
        DB::table('reserva_tournament')->insert(
            array(
                'id_tournament' => $idTournament,
                'id_usuario' => $idUser,
                'num_inscripciones' => $numPlayers
            )
        );
    }

    public static function deleteInscription($idInscription){
        DB::table('reserva_tournament')
            ->where('id',$idInscription)->delete();        
    }

    public static function decrementParticipantsInATournament($idTournament,$numPlayers){
        DB::table('tournaments')
            ->where('id',$idTournament)
            ->decrement('num_participantes_actual',$numPlayers);
    }
}
