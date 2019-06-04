<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Reserva;
use App\Tournaments;
use App\Deporte;
use App\Servicio;
use App\Pista;
use App\DeportesEstablecimiento;
use App\ServiciosEstablecimiento;
use Illuminate\Http\Request;
use DB;
use DateTime;

class TournamentsController extends Controller
{
    /**
     * 
     * Función que recoge los torneos destacados
     *
     * Función que recoge de la BBDD los torneos destacados 
     * para mostrar en la vista principal de torneos
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
     * @return \Illuminate\View\View Vista principal de torneos donde se muestra el formulario de búsqueda de torneos y los torneos destacados
     */
    public function tournaments(){
        $tournaments = Tournaments::getAllTournamentsVip();
        $sportTypes  = Deporte::getAllSports();
        return view('tournament',compact('tournaments','sportTypes'));
    }

    /**
     * 
     * Función que transforma una fecha de string a date
     * @author HolgerCastillo
     * @return date Devuelve la fecha actual en el formato yyyy/mm/dd
     */
    public function getActualDate(){
        $dateArray = getDate();
        $day = $dateArray['mday'];
        $month = $dateArray['mon'];
        $year = $dateArray['year'];
        $date = date_create("$year-$month-$day");
        return $date;
    }

    /**
     *
     * Función que recoge la búsqueda introducida de torneos
     *
     * Funció que recoge los datos introducidos por el ususario
     * de su búsqueda personalizada de torneos. Trata estos datos 
     * y los utiliza para buscar torneos que coincidad con estas
     * características, y finalmente los muestra.
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
     * @param Request $request Información sobre la búsqueda de torneos del usuario
     * @return \Illuminate\View\View Vista donde es muestran los diferentes torneos con las características que ha seleccionado el
     * usuario
     */
    public function tournamentsSearched(Request $request){
        $city = $request->input('name');
        $sport = $request->input('sport');
        $sportName = Deporte::getSportNameById($sport);
        $idGender = $request->input('gender');
        $gender = Deporte::transformIdToGender($idGender);        
        $date = $request->input('fecha');
        $date = date_format(date_create($date),"y-m-d");
        if(is_null($date)){
            $date = getActualDate();
        }
        $tournsSearched = Tournaments::findTournaments($city,$gender,$sport,$date);
        return view('TournamentsSearched',compact('city','sportName','gender','date','tournsSearched'));
    }


    /**
     *
     * Función que permite inscribirse a un torneo
     *
     * Esta función incrementa el número de participantes en un torneo
     * y crea una reserva de este usuario con el torneo
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
     * @param int $idTournament Identificador del torneo seleccionado para inscribirse
     * @param Request $request Información sobre el numero de inscripciones que quiere reservar el usuario
     * @return \Illuminate\View\View Vista principal de torneos
     */
    public function signUpTournament($idTournament,Request $request){
        $numPlayers = $request->input('number');
        Tournaments::incrementParticipantsInATournament($idTournament,$numPlayers);
        Tournaments::signUpForATournament($idTournament,$numPlayers,\Auth::user()->id);
        return redirect()->route('tournaments')->withErrors(['Inscripción guardada','Inscripción guardada']);
    }

    /**
     *
     * Función que permite desuscribirse de un torneo
     *
     * Esta función borra la reserva hecha por el usuario registrado del torneo
     * y decrementa el número de participantes del torneo específico
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
     * @param int $idInscription Identificador de la reserva que se quiere cancelar
     * @param int $idTourny Identificador del torneo seleccionado para desuscribirse 
     * @param int $numPlayers Numero de inscripciones que se habían reservado
     * @return \Illuminate\View\View Vista principal de la página web
     */
    public function unsuscribeTournament($idInscription, $idTourny, $numPlayers){
        Tournaments::deleteInscription($idInscription);
        Tournaments::decrementParticipantsInATournament($idTourny,$numPlayers);
        return redirect()->route('home')->withErrors(['Inscripción eliminada','Inscripción eliminada']);
    }
}
