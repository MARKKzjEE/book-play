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

        $sportTypes  = Deporte::getAllSports();
        $sportsCentersVIP = DB::table('establecimiento')->where('prioridad','1')->get();
        return view('Homepage',compact('sportsCentersVIP','sportTypes'));
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

    public function club($ID){
        //$pistas = $center->pistas;

        /** @var Establecimiento $center */
        $center = Establecimiento::where('id', $ID)->firstOrFail();
        /** @var Establecimiento $center */
        

        $sports = DeportesEstablecimiento::where('id_club',$ID)
                ->join('deporte','deporte.id','=','deportes_establecimiento.id_deporte')->get();
        
        $services = ServiciosEstablecimiento::where('id_club',$ID)
                ->join('servicio','servicio.id','=','servicios_establecimiento.id_servicio')->get();
        

        return view('Club',compact('center','sports','services'));
    }

    /**
     * 
     * Functions relative to Tournaments
     */



    public function tournaments(){

        $tournaments = Tournaments::getAllTournamentsVip();
        $sportTypes  = Deporte::getAllSports();
        return view('tournament',compact('tournaments','sportTypes'));

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
  

        $tournsSearched = Tournaments::select('*','tournaments.id as id_tourny')
            ->join('establecimiento','establecimiento.id','=','tournaments.id_club')
            ->where('establecimiento.direccion','LIKE','%' . $city . '%')
            ->where([
                ['genero', '=', $gender],
                ['id_deporte', '=', $sport],
                ['fecha', '>=' , $date]
            ])
            ->get();

        return view('TournamentsSearched',compact('city','sport','sportName','gender','date','tournsSearched'));

    }



    public function signUpTournament($idTournament,Request $request){

        //echo "id de torneo: " . $idTournament . "<br>";
        //$idUser = 2;
        $numPlayers = $request->input('number');

        DB::table('tournaments')
                    ->where('id',$idTournament)
                    ->increment('num_participantes_actual', $numPlayers);

        DB::table('reserva_tournament')->insert(
            array(
                'id_tournament' => $idTournament,
                'id_usuario' => 1,
                'num_inscripciones' => $numPlayers
            )
        );
        /* EL ID DEL USUSRIO SE PUEDE SACAR CON $this->authorize('modifyUser', auth()->user()); 
        **
        **
        */
        return redirect()->route('tournaments')->withErrors(['Inscripción guardada','Inscripción guardada']);
    }

    public function unsuscribeTournament($idReserveTourny, $idTourny, $numPlayers){
        DB::table('reserva_tournament')
            ->where('id',$idReserveTourny)->delete();

        DB::table('tournaments')
            ->where('id',$idTourny)
            ->decrement('num_participantes_actual',$numPlayers);

        return redirect()->route('home')->withErrors(['Inscripción eliminada','Inscripción eliminada']);
    }
    /**
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     */
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
        $sportsCentersSearched = $sportsCentersSearched->select('establecimiento.*')->distinct()->get();
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
        $wallTypes = DB::table('pista')->where('pared', '!=', null)->select('pared')->distinct()->get();
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
        $center = Establecimiento::where('id', $idclub)->firstOrFail();

        //$datosestablecimiento = $this->datosestablecimiento($id);
        $datospista = $this->datospista($idclub);
        //$datosreserva = $this->datosreserva($id);
        $datosdeporte = $this->datosdeporte();

        return view('timetable', compact('datosdeporte', 'idclub', 'iduser','fieldTypes','enclosureTypes','wallTypes','center'));
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



    /**
     *  Functions relative to ClubPage
     * 
     * 
     * 
     * 
     */

    public function getprofileinfo($idprofile, $return){
        $profileInfo = \DB::table('users')
            ->where('users.id', '=', $idprofile)
            ->get();

        $myTournaments = DB::table('reserva_tournament')
            ->select('*','reserva_tournament.id as id_reserva')
            ->join('tournaments','tournaments.id','=','reserva_tournament.id_tournament')
            ->join('deporte','deporte.id','=','tournaments.id_deporte')
            ->where('id_usuario',1)->get()->toArray();
        //dd($myTournaments);
        return view('myProfile', compact('profileInfo', 'idprofile', 'return','myTournaments'));
    }

    public function editprofileprivate(Request $request, $idprofile){
        $username = $request->input('username');
        $biography = $request->input('biography');

        $query = \DB::table('users')->where('id',$idprofile);
        $return = false;
        if($username != null) {
            $query->update(['username' => $username]);
            $return = true;
        }

        if($biography != null) {
            $query->update(['descripcion'=> $biography]);
            $return = true;
        }

        return $this->getprofileinfo($idprofile, $return);

    }

    public function editprofilepublic(Request $request, $idprofile){
        $name = $request->input('name');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $zip = $request->input('zip');
        $city = $request->input('city');
        $adress = $request->input('adress');

        $query = \DB::table('users')->where('id',$idprofile);
        $return = false;
        if($name != null) {
            $query->update(['name' => $name]);
            $return = true;
        }

        if($email != null) {
            $query->update(['email'=> $email]);
            $return = true;
        }

        if($tel != null) {
            $query->update(['telefono' => $tel]);
            $return = true;
        }

        if($zip != null) {
            $query->update(['codigo_postal'=> $zip]);
            $return = true;
        }

        if($city != null) {
            $query->update(['ciudad' => $city]);
            $return = true;
        }

        if($adress != null) {
            $query->update(['direccion'=> $adress]);
            $return = true;
        }

        return $this->getprofileinfo($idprofile, $return);

    }

    public function editpassword(Request $request, $idprofile) {

        $bool = false;
        $bool = false;
        $actualPasswordInput = brypt($request->input('inputPasswordCurrent'));

        $actualPasswordSelect = \DB::table('users')
            ->select('users.password')
            ->where('users.id', '=', $idprofile)
            ->get();

        if($actualPasswordInput == $actualPasswordSelect){
            $bool = true;
        }

        if($request->input('inputPasswordNew') == $request->input('inputPasswordNew2')){
            $newPasswordInput = bcrypt($request->input('inputPasswordNew'));
            $bool2 = true;
        }

        $query = \DB::table('users')->where('id',$idprofile);
        $query->update(['password' => $newPasswordInput]);

        if($bool && $bool2){
            $return = true;
            return $this->getprofileinfo($idprofile, $return);
        }
        else {
            echo '<div style="display:none;" class="card-title mb-0 msgUpdate"><p><b>Contraseña actual o comprobación de la nueva contraseña erroneas.</b></p></div>';
        }


    }

    public function deleteaccount(Request $request, $idprofile) {

        if($request->has('ok')){
            $query = \DB::table('users')->where('id',$idprofile);
            $query->delete();
            echo '<div style="display:none;" class="card-title mb-0 msgUpdate"><p><b>Cuenta eliminada!</b></p></div>';

        }
        else if($request->has('no')){
            return $this->getprofileinfo($idprofile, false);
        }

    }
}
