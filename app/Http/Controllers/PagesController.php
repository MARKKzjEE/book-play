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



class PagesController extends Controller
{
    /**
     * Muestra la página principal de la web
     *
     * En la página principal solo se muestran los clubes
     * destacados. Y un formulario con diferentes filtros
     * para buscar clubes.
     *
     *  @author HolgerCastillo
     */
    public function inicio(){
        $sportTypes  = Deporte::getAllSports();
        $sportsCentersVIP = Establecimiento::getAllClubsVip();
        return view('Homepage',compact('sportsCentersVIP','sportTypes'));
    }

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

    /**
     * METODO TEMPORAL
     */
    public function logOut(){
        //return view('LogOut');
        return "log out";
    }

    /**
     * 
     * Descripción básica (1 linea)
     * 
     * Descripción detallada
     *
     * @author nickGithub
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
     * Descripción básica (1 linea)
     * 
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function deleteClub($idClub){
        DeportesEstablecimiento::deleteByClubId($idClub);
        Tournaments::deleteTournamentsOfClub($idClub);
        Establecimiento::deleteClub($idClub);
        return redirect()->route('eliminar')->withErrors(['Club eliminado','Club eliminado']);
    }

    /**
     * 
     * Descripción básica (1 linea)
     * 
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function deleteDeporte($idDeporte){
        Tournaments::deleteTournamentsOfSport($idDeporte);
        DeportesEstablecimiento::deleteBySportId($idDeporte);
        Deporte::deleteSport($idDeporte);
        return redirect()->route('eliminar')->withErrors(['Deporte eliminado','Deporte eliminado']);
    }

    /**
     * 
     * Descripción básica (1 linea)
     * 
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function deleteServicio($idServe){
        ServiciosEstablecimiento::deleteByServiceId($idServe);
        Servicio::deleteService($idServe);
        return redirect()->route('eliminar')->withErrors(['Servicio eliminado','Servicio eliminado']);
    }

    /**
     * 
     * Descripción básica (1 linea)
     * 
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function deletePista($idpista){
        Pista::deleteField($idpista);
        return redirect()->route('eliminar')->withErrors(['Club eliminado','Club eliminado']);
    }

    /**
     * 
     * Descripción básica (1 linea)
     * 
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function deleteTorneo($torneo){
        Tournaments::deleteTournament($torneo);
        return redirect()->route('eliminar')->withErrors(['Torneo eliminado','Torneo eliminado']);
    }

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

    /**
     * 
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
     */
    public function tournaments(){
        $tournaments = Tournaments::getAllTournamentsVip();
        $sportTypes  = Deporte::getAllSports();
        return view('tournament',compact('tournaments','sportTypes'));
    }

    /**
     * 
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author HolgerCastillo
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
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
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
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
     */
    public function signUpTournament($idTournament,Request $request){
        $numPlayers = $request->input('number');
        Tournaments::incrementParticipantsInATournament($idTournament,$numPlayers);
        Tournaments::signUpForATournament($idTournament,$numPlayers,\Auth::user()->id);
        return redirect()->route('tournaments')->withErrors(['Inscripción guardada','Inscripción guardada']);
    }

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author HolgerCastillo
     * @author marcgarcia1997
     */
    public function unsuscribeTournament($idInscription, $idTourny, $numPlayers){
        Tournaments::deleteInscription($idInscription);
        Tournaments::decrementParticipantsInATournament($idTourny,$numPlayers);
        return redirect()->route('home')->withErrors(['Inscripción eliminada','Inscripción eliminada']);
    }

    /**
     * 
     * Descripción básica (1 linea)
     * 
     * Descripción detallada
     *
     * @author nickGithub
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

     /**
     *
     * Devuelve datos de establecimiento
     *
     * Recupera y retorna los datos de un
      * establecimiento específico
     *
     * @author ArnauRovira
     */
    public function datosestablecimiento($id){
        return Establecimiento::datosestablecimiento($id);
    }


    /**
     *
     * Devuelve datos de una pista
     *
     * Recupera y retorna los datos de una
     * pista específico
     * @author ArnauRovira
     */
    public function datospista($id){
        return Pista::datospista($id);
    }

    /**
     *
     * Devuelve las pistas que tengan esos filtros
     *
     * Recupera y retorna los datos de las pistas que contengan
     * los filtros de búsqueda que el usuario ha filtrado
     *
     * @author ArnauRovira
     */
    public function datospistafilter( $superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        return Pista::datospistafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id);
    }

    /**
     *
     * Devuelve todas las reservas echas en este dia según el filtro
     *
     * Recupera todos los datos de las reservas echas en 1 club
     * y 1 día específico según los filtros que se aplican en la búsqueda y
     * los retorna
     *
     * @author ArnauRovira
     */
    public function datosreservafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        return Reserva::datosreservafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id);
    }

    /**
     *
     * Devuelve todas las reservas echas en este dia
     *
     * Recupera todos los datos de las reservas echas en 1 club
     * y 1 día específico y los retorna
     *
     * @author ArnauRovira
     */
    public function datosreserva($id,$today){
        return Reserva::datosreserva($id,$today);
    }

    /**
     *
     * Devuelve todos los deportes
     *
     * Recupera y devuelve todos los deportes
     * existentes de la base de datos para los filtros de reserva
     *
     * @author ArnauRovira
     */
    public function datosdeporte(){
        return Deporte::datosdeporte();
    }

    /**
     *
     * Devuelve el container con las pistas que cumplan los filtros
     *
     * Recupera los datos de las pistas, clubes y reservas que
     * cumplan con los filtros que se pasan por parámetro y luego
     * devuelve el container de reservas
     *
     * @author ArnauRovira
     */
    public function filters($superficie,$cercamiento,  $pared, $deporte, $today, $idclub, $iduser){
        $datospista = $this->datospistafilter($superficie,$cercamiento,  $pared, $deporte, $today, $idclub);

        $datosestablecimiento = $this->datosestablecimiento($idclub);

        $datosreserva = $this->datosreservafilter($superficie,$cercamiento,  $pared, $deporte, $today, $idclub);

        {
            return view('timetablepart', compact('datosestablecimiento', 'datosreserva', 'datospista', 'idclub', 'iduser', 'today'));
        }
    }

    /**
     *
     * Devuelve Pista de Reservas
     *
     * Recupera los datos para los filtros de reservas y
     * retorna la vista
     *
     * @author ArnauRovira
     */
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

    /**
     *
     * Muestra container de los horarios de la reserva
     *
     * Recupera los datos del establecimiento, reservas
     * y pistas para retornarlos a la vista
     *
     * @author ArnauRovira
     */
    public function timetablepart($idclub, $iduser,$today){

        $datosestablecimiento = $this->datosestablecimiento($idclub);
        $datospista = $this->datospista($idclub);
        $datosreserva = $this->datosreserva($idclub,$today);

        {return view('timetablepart', compact('datosestablecimiento','today',  'datospista', 'datosreserva','idclub', 'iduser'));}
    }

    /**
     *
     * Información sobre la proxima reserva
     *
     * Devuelve los datos de la próxima reserva
     * respecto la hora que se le pasa
     *
     * @author ArnauRovira
     */
    public function timenextbook($id_pista, $fecha_total, $dia){
        return Reserva::timenextbook($id_pista, $fecha_total, $dia);
    }

    /**
     *
     * Devuelve los datos de un establecimiento
     *
     * Devuelve las franjas horarias del establecimiento que
     * contiene la id de la pista que se desea
     *
     * @author ArnauRovira
     */
    public function datosestablecimientoidpista($id){
        return Establecimiento::datosestablecimientoidpista($id);
    }

    /**
     *
     * Muestra informacion detallada para resevar
     *
     * Devuelve una vista que muestra la franja horaria
     * que el usuario puede reservar y le permite reservar
     * dicha pista
     *
     * @author ArnauRovira
     */
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

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function getpreciopista($idpista){
        return Pista::getpreciopista($idpista);
    }
    
    /**
     *
     * Insertar reserva base de datos
     *
     * Recupera todos los datos de usuario y de pista
     * e inserta la reserva en la base de datos,
     * devuelve una vista mostrando que se ha reservado correctamente
     *
     * @author ArnauRovira
     */
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
                , 'estado_reserva' => 1, 'estado_pago' => 1, 'id_pago' => 1, 'cantidad' => $precio, 'descripcion' => "PistaReservada"]
        );

        echo "<b style='padding-left: 40%; font-size: 20px;'>Pista Reservada!</b>";

    }



    /**
     *  Functions relative to ClubPage
     * 
     * 
     * 
     * 
     */

     /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function getprofileinfo($idprofile, $return){
        $profileInfo = \DB::table('users')
            ->where('users.id', '=', $idprofile)
            ->get();

        $myTournaments = DB::table('reserva_tournament')
            ->select('*','reserva_tournament.id as id_reserva')
            ->join('tournaments','tournaments.id','=','reserva_tournament.id_tournament')
            ->join('deporte','deporte.id','=','tournaments.id_deporte')
            ->where('id_usuario',\Auth::user()->id )->get()->toArray();
        $reservas = \DB::table('reserva')
            ->select('reserva.*','establecimiento.imagen_perfil', 'establecimiento.nombre')
            ->where('id_usuario', '=', $idprofile)
            ->join('pista', 'pista.id', '=', 'reserva.id_pista')
            ->join('establecimiento', 'establecimiento.id', '=', 'pista.id_club')
            ->get();
        //dd($myTournaments);
        return view('myProfile', compact('profileInfo', 'idprofile', 'return','myTournaments', 'reservas'));
    }

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
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

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
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

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
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

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
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

    /**
     *
     * Elimina la reserva seleccionada
     *
     * Devuelve la vista del perfil de usuario con la
     * lista de reservas actualizada
     *
     * @author ArnauRovira
     */
    public function deletebook($idbook, $idprofile) {

        Reserva::deletebook($idbook, $idprofile);
        return $this->getprofileinfo($idprofile, false);
    }


}


