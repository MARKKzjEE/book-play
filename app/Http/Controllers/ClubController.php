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

class ClubController extends Controller
{
    /**
     * Muestra la información de un club
     *
     * Muestra los deportes y los servicios que proporciona
     * un club, además muestra una foto del establecimiento
     * y una pequeña descripción de este.
     *
     * @author HolgerCastillo
     */
    public function club($ID){
        $center = Establecimiento::getClubById($ID);
        $sports = DeportesEstablecimiento::getAllSportByClubId($ID);
        $services = ServiciosEstablecimiento::getAllServicesByClubId($ID);
        return view('Club',compact('center','sports','services'));
    }
}
