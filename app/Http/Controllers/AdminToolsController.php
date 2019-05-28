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
        $sports = DB::table('deporte')->select('id','nombre')->get();
        $clubes = DB::table('establecimiento')->select('id','nombre')->get();
        $services = DB::table('servicio')->select('id','nombre')->get();
        return view('Eliminar', compact('clubs','deportes','servicios','pistas','torneos','sports','clubes','services'));
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
    /**
     * Función que añade la relacion de deportes_establecimientos
     *
     * @author oriol
     */
    public function InsertSport(Request $request)
    {
        $id_sport = $request->input('sports');
        $id_club = $request->input('clubs');
        DB::table('deportes_establecimiento')->insert(array('id_deporte' => $id_sport, 'id_club' => $id_club));
        return redirect()->route('eliminar')->withErrors(['Deporte añadido','Deporte añadido']);
    }
    /**
     * Función que añade la relación de servicios_establecimiento
     *
     * @author oriol
     */
    public function InsertService(Request $request)
    {
        $id_service = $request->input('services');
        $id_club = $request->input('clubs');
        DB::table('servicios_establecimiento')->insert(array('id_servicio' => $id_service, 'id_club' => $id_club));
        return redirect()->route('eliminar')->withErrors(['Servicio añadido','Servicio añadido']);
    }
    /**
     * Función que añade una pista
     *
     * @author oriol
     */
    public function StorePista(Request $request)
    {
        $name = $request ->input('name');
        $superficie = $request ->input('superficie');
        $cerramiento = $request ->input('cerramiento');
        $wall = $request ->input('wall');
        $price = $request->input('price');
        $club = $request->input('clubs');
        $sport = $request->input('sports');


        DB::table('pista')->insert(array('nombre' => $name, 'superficie' => $superficie, 'cerramiento' => $cerramiento,
            'pared' => $wall,'precio' => $price, 'id_club' => $club, 'id_deporte' => $sport));

        return redirect()->route('eliminar')->withErrors(['Pista añadida','Pista añadida']);

    }
    /**
     * Función que añade un torneo
     *
     * @author oriol
     */
    public function insertTournament(Request $request)
    {
        $name = $request ->input('name');
        $club = $request->input('clubs');
        $email = $request->input('email');
        $sport = $request->input('sports');
        $gender = $request->input('gender');
        $date = $request ->input('date');
        $price = $request->input('price');
        $priority = $request->input('priority');
        $num_par_max = $request->input('num_par_max');
        $num_par_act = $request->input('num_par_act');

        DB::table('pista')->insert(array('name' => $name, 'id_club' => $club, 'email' => $email,
            'id_deporte' => $sport,'genero' => $gender, 'fecha' => $date, 'precio' => $price,'prioridad' => $priority,
            'num_participantes_max' => $num_par_max,'num_participantes_actual' => $num_par_act));

        return redirect()->route('eliminar')->withErrors(['Torneo añadido','Torneo añadido']);
    }
    /**
     *
     * Función que añade un club
     *
     * @author oriol
     */
    public function insertClub(Request $request)
    {
        $email = $request->input('email');
        $name = $request ->input('name');
        $direction = $request ->input('direction');
        $cp = $request ->input('cp');
        $phone = $request ->input('phone');
        $priority = $request->input('priority');
        $desctription = $request->input('desctription');
        $img_profile = $request->input('img_profile');
        $hora_init = $request->input('hora_init');
        $hora_end = $request->input('hora_end');

        DB::table('pista')->insert(array('name' => $name, 'mail' => $email,
            'direccion' => $direction,'codigo_postal' => $cp, 'telefono' => $phone, 'prioridad' => $priority,'descripcion' => $desctription,
            'imagen_perfil' => $img_profile,'hora_inicio' => $hora_init, 'hora_final' => $hora_end));

        return redirect()->route('eliminar')->withErrors(['Club añadido','Club añadido']);
    }
}
