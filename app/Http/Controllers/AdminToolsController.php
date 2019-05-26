<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establecimiento;
use App\Reserva;
use App\Tournaments;
use App\Deporte;
use App\Servicio;
use App\Pista;
use App\DeportesEstablecimiento;
use App\ServiciosEstablecimiento;
use DB;
use DateTime;

class AdminToolsController extends Controller
{
    /**
     * 
     * Funcion que recoge todos los datos de la BBDD
     * 
     * Recoge todo los datos de la BBDD para la vista del administrador
     *
     * @author albertfor
     */
    public function eliminar(){
        $clubs  = Establecimiento::getAllClubs(); 
        $deportes = Deporte::getAllSports();
        $servicios = Servicio::getAllServices();
        $pistas = Pista::getAllPistas();
        $torneos = Tournaments::getAllTournaments();
        return view('Eliminar', compact('clubs','deportes','servicios','pistas','torneos'));
    }

    /**
     * 
     * Función que elimina un club de la BBDD
     * 
     * Función que elimina un club y sus torneos de la BBDD
     *
     * @author albertfor
     */
    public function deleteClub($idClub){
        DeportesEstablecimiento::deleteByClubId($idClub);
        Tournaments::deleteTournamentsOfClub($idClub);
        Establecimiento::deleteClub($idClub);
        return redirect()->route('eliminar')->withErrors(['Club eliminado','Club eliminado']);
    }

    /**
     * 
     * Función que elimina un deporte de la BBDD
     * 
     * Función que eliminar un deporte de la BBDD y todos los 
     * torneos de ese deporte
     *
     * @author albertfor
     */
    public function deleteDeporte($idDeporte){
        Tournaments::deleteTournamentsOfSport($idDeporte);
        DeportesEstablecimiento::deleteBySportId($idDeporte);
        Deporte::deleteSport($idDeporte);
        return redirect()->route('eliminar')->withErrors(['Deporte eliminado','Deporte eliminado']);
    }

    /**
     * 
     * Funcón que elimina un servicio de la BBDD
     * 
     * 
     *
     * @author albertfor
     */
    public function deleteServicio($idServe){
        ServiciosEstablecimiento::deleteByServiceId($idServe);
        Servicio::deleteService($idServe);
        return redirect()->route('eliminar')->withErrors(['Servicio eliminado','Servicio eliminado']);
    }

    /**
     * 
     * Función que eliminar una pista de la BBDD
     * 
     * 
     *
     * @author albertfor
     */
    public function deletePista($idpista){
        Pista::deleteField($idpista);
        return redirect()->route('eliminar')->withErrors(['Club eliminado','Club eliminado']);
    }

    /**
     * 
     * Función que elimina un torneo de la BBDD
     * 
     * 
     *
     * @author albertfor
     */
    public function deleteTorneo($torneo){
        Tournaments::deleteTournament($torneo);
        return redirect()->route('eliminar')->withErrors(['Torneo eliminado','Torneo eliminado']);
    }
}
