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

class RequestNewClubController extends Controller
{
    /**
     * Devuelve un formulario para registrar un club
     *
     * Devuele una vista con un formulario para enviar
     * una petición al administrador para añadir un club
     * a la página web.
     *
     * @author HolgerCastillo
     */
    public function registrationClub(){
        return view('RegistrationClub');
    }
}
