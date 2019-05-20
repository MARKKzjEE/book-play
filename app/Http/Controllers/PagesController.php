<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Tournaments;
use App\Deporte;
use App\Servicio;
use App\DeportesEstablecimiento;
use App\ServiciosEstablecimiento;
use Illuminate\Http\Request;
use DB;
use DateTime;



class PagesController extends Controller
{
    public function inicio(){
        $sportsCentersVIP = DB::table('establecimiento')->where('prioridad','1')->get();
        return view('Homepage',compact('sportsCentersVIP'));
    }

    public function registrationClub(){
        return view('RegistrationClub');
    }

    public function logIn(){
        return view('LogIn');
    }

    public function logOut(){
        //return view('LogOut');
        return "log out";
    }

    public function registration(){
        return view('Registration');
    }

    public function myProfile(){
        return view('MyProfile');
    }

    public function club($ID = null){
        //$pistas = $center->pistas;

        /** @var Establecimiento $center */
        $center = Establecimiento::where('id', $ID)->firstOrFail();
        /** @var Establecimiento $center */
        

        $sports = DeportesEstablecimiento::where('id_club',$ID)->get();
        $services = ServiciosEstablecimiento::where('id_club',$ID)->get();

        $sportsNames = array();
        $servicesNames = array();

        foreach($sports as $sport){
            $sportsClub = Deporte::where('id',$sport->id_deporte)->get();
            array_push($sportsNames,[$sportsClub[0]->nombre,$sportsClub[0]->id_imagen]);
        }

        foreach($services as $service){
            $servicesClub = Servicio::where('id',$service->id_servicio)->get();
            array_push($servicesNames,[$servicesClub[0]->nombre,$servicesClub[0]->id_imagen]);
        }

        return view('Club',compact('center','sportsNames','servicesNames'));
    }
    public function tournaments(){
        
        $tournaments = Tournaments::where('prioridad','1')->get();
        return view('tournament',compact('tournaments'));

    }

    public function tournamentsSearched(Request $request){

        $city = $request->input('name');
         
        $sport = $request->input('sport');
        $sportName = Deporte::where('id',$sport)->firstOrfail()->nombre;
        
        $gender = $request->input('gender');
        if($gender == 1){
            $gender = 'Masculino';
        }else if($gender == 2){
            $gender = 'Femenino';
        }else{
            $gender = 'Mixto';
        }

        
        $date = $request->input('fecha');
        $date = date_format(date_create($date),"y-m-d");
        
        if(is_null($date)){
            $dateArray = getDate();
            $day = $dateArray['mday'];
            $month = $dateArray['mon'];
            $year = $dateArray['year'];
            $date = date_create("$year-$month-$day");
        }


        $tournsSearched = DB::table('tournaments')->join('establecimiento','establecimiento.id','=','tournaments.id_club')
                                                    ->where('establecimiento.direccion','LIKE','%' . $city . '%')
                                                    ->where([
                                                        ['genero', '=', $gender],
                                                        ['id_deporte', '=', $sport],
                                                        ['fecha', '>=' , $date]
                                                    ])->get();
        
        return view('TournamentsSearched',compact('city','sport','sportName','gender','date','tournsSearched'));

    }

    public function reservar(){
        return view('Reservar');
    }



    public function search(Request $request){
        $city = $request->input('city');
        $sport = $request->input('sport');
        $date = $request->input('date');

        $enclosure =$request->input('enclosure');
        $surface =$request->input('surface');
        $wall =$request->input('wall');

        $sportsCentersSearched = DB::table('establecimiento');
        if ($city) {
            $sportsCentersSearched = $sportsCentersSearched->where('direccion', 'LIKE', '%' . $city . '%');
        }
        if ($sport) {
            $sportsCentersSearched = $sportsCentersSearched->join('deportes_establecimiento', 'establecimiento.id', '=', 'deportes_establecimiento.id_club');
            $sportsCentersSearched = $sportsCentersSearched->where('deportes_establecimiento.id_deporte', '=', $sport);
        }
       /* if ($date) {
            $sportsCentersSearched = $sportsCentersSearched->join('pista', 'establecimiento.id', '=', 'pista.id_club');
            $sportsCentersSearched = $sportsCentersSearched->join('reserva', 'pista.id', '=', 'reserva.id_pista');
            $sportsCentersSearched = $sportsCentersSearched->where('establecimiento.hora_inicio', '=', $date);
        } */
        if($enclosure || $surface || $wall){
            $sportsCentersSearched = $sportsCentersSearched->join('pista', 'establecimiento.id', '=', 'pista.id_club');
        }
        if($enclosure){
            $sportsCentersSearched = $sportsCentersSearched->where('pista.cerramiento', '=', $enclosure);
        }
        if($surface){
            $sportsCentersSearched = $sportsCentersSearched->where('pista.superficie', '=', $surface);
        }
        if($wall){
            $sportsCentersSearched = $sportsCentersSearched->where('pista.pared', '=', $wall);
        }
        $sportsCentersSearched = $sportsCentersSearched->get();
        //Date format: month/day/year
        if(is_null($date)){
            $dateArray = getDate();
            $day = $dateArray['mday'];
            $month = $dateArray['mon'];
            $year = $dateArray['year'];
            $date = date_create("$day-$month-$year");
            $date = date_format($date,"d/m/Y");
        }
        $surfaceTypes = DB::table('pista')->select('superficie')->distinct()->get();
        $wallTypes = DB::table('pista')->select('pared')->distinct()->get();
        $enclosureTypes = DB::table('pista')->select('cerramiento')->distinct()->get();
        $sportTypes  = DB::table('deporte')->select('id', 'nombre')->distinct()->get();  /* El distinct no es realmente necesario aqui */
        return view('Search',compact('city','sport','date','enclosure','surface','wall','sportsCentersSearched','surfaceTypes','wallTypes','enclosureTypes', 'sportTypes'));
    }

    /**
     * 
     * 
     * Functions relative to book a club field 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */
    public function datosestablecimiento($id){
        return \DB::table('establecimiento')
            ->select('establecimiento.hora_inicio as hora_inicio', 'establecimiento.hora_final as hora_final')
            ->where('establecimiento.id', '=', $id)
            ->get();
    }

    public function datospista($id){
        return \DB::table('pista')
            ->select('pista.nombre as nombrepista', 'pista.id as id_pista')
            ->join('establecimiento', 'pista.id_club', '=', 'establecimiento.id')
            ->where('establecimiento.id', '=', $id)
            ->orderBy('pista.id', 'asc')
            ->get();
    }

    public function datospistafilter( $superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        $filter = \DB::table('pista')
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

    public function datosreservafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        $filter = \DB::table('reserva')
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

    public function datosreserva($id,$today){
        return \DB::table('reserva')
            ->select('reserva.hora_inicio as hora_inicio','reserva.hora_final as hora_final', 'reserva.id_pista as id_pista', 'pista.nombre as nombrepista', 'establecimiento.nombre as nombreestablecimiento')
            ->join('pista', 'reserva.id_pista', '=', 'pista.id')
            ->join('establecimiento', 'pista.id_club', '=', 'establecimiento.id')
            ->where('establecimiento.id', '=', $id)
            ->where('reserva.fecha_reserva', '=', $today)
            ->orderBy('reserva.id_pista', 'asc')
            ->get();
    }

    public function datosdeporte(){
        return \DB::table('deporte')
            ->select('deporte.id as id_deporte', 'deporte.nombre as nombre_deporte')
            ->get();
    }

    public function filters($superficie,$cercamiento,  $pared, $deporte, $today, $idclub, $iduser){
        $datospista = $this->datospistafilter($superficie,$cercamiento,  $pared, $deporte, $today, $idclub);

        $datosestablecimiento = $this->datosestablecimiento($idclub);

        $datosreserva = $this->datosreservafilter($superficie,$cercamiento,  $pared, $deporte, $today, $idclub);

        {
            return view('timetablepart', compact('datosestablecimiento', 'datosreserva', 'datospista', 'idclub', 'iduser', 'today'));
        }
    }

    public function timetable($idclub, $iduser){


        $fieldTypes = DB::table('pista')->select('superficie')->distinct()->get();
        $enclosureTypes = DB::table('pista')->select('cerramiento')->distinct()->get();
        $wallTypes = DB::table('pista')->select('pared')->distinct()->get();

        //$datosestablecimiento = $this->datosestablecimiento($id);
        $datospista = $this->datospista($idclub);
        //$datosreserva = $this->datosreserva($id);
        $datosdeporte = $this->datosdeporte();

        return view('timetable', compact('datosdeporte', 'idclub', 'iduser','fieldTypes','enclosureTypes','wallTypes'));
    }

    public function timetablepart($idclub, $iduser,$today){

        $datosestablecimiento = $this->datosestablecimiento($idclub);
        $datospista = $this->datospista($idclub);
        $datosreserva = $this->datosreserva($idclub,$today);

        {return view('timetablepart', compact('datosestablecimiento','today',  'datospista', 'datosreserva','idclub', 'iduser'));}
    }

    public function timenextbook($id_pista, $fecha_total, $dia){
        return \DB::table('reserva')
            ->select('reserva.hora_inicio as hora_inicio', 'reserva.id_pista as id_pista')
            ->where('reserva.id_pista', '=', $id_pista)
            ->where('reserva.hora_inicio', '>', $fecha_total)
            ->where('reserva.fecha_reserva', '=', $dia)
            ->orderBy('reserva.hora_inicio', 'asc')
            ->get();
    }

    public function datosestablecimientoidpista($id){
        return \DB::table('establecimiento')
            ->select('establecimiento.hora_final as hora_inicio', 'pista.id as id_pista')
            ->join('pista', 'pista.id_club', '=', 'establecimiento.id')
            ->where('pista.id', '=', $id)
            ->get();
    }

    public function detailtimetable($fecha, $hora, $id_pista, $id_user){
        $datetotal = $fecha." ".$hora;
        //var_dump($datetotal);
        $booky = 1;
        $var = $this->timenextbook($id_pista, $datetotal, $fecha);
        if(($var) == "[]"){
            $var = $this->datosestablecimientoidpista($id_pista);
            $booky = 0;
        }
        foreach ($var as $actual){
            $nextschedule = $actual;
            break;
        }

        //var_dump($nextschedule);
        return view('timetabledetail', compact('fecha','booky', 'hora', 'id_pista', 'nextschedule', 'datetotal', 'id_user'));
    }

    public function getpreciopista($idpista){
        return \DB::table('pista')
            ->select('pista.precio as preciopista')
            ->where('pista.id', '=', $idpista)
            ->get();
    }
    
    public function insertbookbd($finalhour, $initialhour, $iduser, $date, $idpista){


        $finalhour = $date." ".$finalhour;
        $initialhour = $date." ".$initialhour;

        $fecha1 = new DateTime($initialhour);//fecha inicial
        $fecha2 = new DateTime($finalhour);//fecha de cierre
        $intervalo = $fecha1->diff($fecha2);
        $minutos = $intervalo->h*60 + $intervalo->i;
        $minutos = $minutos/30;

        $arraypistas = $this->getpreciopista($idpista);
        foreach ($arraypistas as $pista){
            $precio = $pista->preciopista;
            break;
        }
        $precio = $minutos*$precio;
        \DB::table('reserva')->insert(
            ['fecha_reserva' => $date, 'hora_inicio' => $initialhour, 'hora_final' => $finalhour, 'id_usuario' => $iduser, 'id_pista' => $idpista, 'sum_modulos' => 0
                , 'estado_reserva' => 1, 'estado_pago' => 1, 'id_pago' => 1, 'cantidad' => $precio, 'descripcion' => "hola"]
        );

        echo "<b style='padding-left: 40%; font-size: 20px;'>Pista Reservada!</b>";

    }


    public function insertarReserva(Request $request){

        $fecha_reserva = $request->input('fechareserva');
        $horainicio = $request->input('fechareserva');
        $horafinal = $request->input('fechareserva');

        for($i = 0; $i< 3; $i++){
            \DB::table('reserva')->insert(
                ['fecha_reserva' => $fecha_reserva, 'hora_inicio' => $horainicio, 'hora_final' => $horafinal, 'sum_modulos' => 0
                    , 'estado_reserva' => 1, 'estado_pago' => 1, 'id_pago' => 1, 'cantidad' => 1, 'descripcion' => "hola"]
            );

        }
        echo "Reservado!";
    }







    

}
