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

class ReserveFieldController extends Controller
{
     /**
     *
     * Devuelve datos de establecimiento
     *
     * Recupera y retorna los datos de un
      * establecimiento específico
     *
     * @author ArnauRovira
      * @param int $id Número de id del establecimiento
      * @return Establecimiento de la id específica
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
     * @param int $id Número de id de la pista
     * @return Pista de la id específica
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
     * @param string $superficie Superfície de la pista
     * @param string $cercamiento Tipo de suelo de la pista
     * @param string $pared Cercamiento de la pista
     * @param string $deporte Tipo de deporte de la pista
     * @param stamp $fecha Fecha de la pista
     * @param int $id Número id de la pista
     * @return Pistas con el filtro aplicado
     */
    public function datospistafilter( $superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        return Pista::datospistafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id);
    }

    /**
     *
     * Devuelve todas las reservas hechas en este dia según el filtro
     *
     * Recupera todos los datos de las reservas echas en 1 club
     * y 1 día específico según los filtros que se aplican en la búsqueda y
     * los retorna
     *
     * @author ArnauRovira
     * @param string $superficie Superfície de la pista
     * @param string $cercamiento Tipo de suelo de la pista
     * @param string $pared Cercamiento de la pista
     * @param string $deporte Tipo de deporte de la pista
     * @param stamp $fecha Fecha de la pista
     * @param int $id Número id de la pista
     * @return Reserva/as realizada
     */
    public function datosreservafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id)
    {
        return Reserva::datosreservafilter($superficie,$cercamiento, $pared, $deporte, $fecha, $id);
    }

    /**
     *
     * Devuelve todas las reservas hechas en este dia
     *
     * Recupera todos los datos de las reservas echas en 1 club
     * y 1 día específico y los retorna
     *
     * @author ArnauRovira
     * @param int $id Número de la id de la reserva
     * @param stamp $today Fecha de hoy
     * @return Reserva realizada en el día especificado
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
     * @return Todos los deportes existentes
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
     * @param string $superficie Superfície de la pista
     * @param string $cercamiento Tipo de suelo de la pista
     * @param string $pared Cercamiento de la pista
     * @param string $deporte Tipo de deporte de la pista
     * @param stamp $today Fecha de la pista
     * @param int $id Número id de la pista
     * @param int $id Número id del usuario
     * @return \Illuminate\View\View Vista con las pistas especificadas
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
     * @param int $idclub Número de id del club
     * @param int $iduser Número de id del usuario
     * @return \Illuminate\View\View Vista con los filtros aplicados
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
     * @param int $idclub Número de id del club
     * @param int $iduser Número de id del usuario
     * @param stamp $fecha Fecha que específica el usuario
     * @return \Illuminate\View\View Vista con los datos del establecimiento y de las pistas para las reservas
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
     * @param int $id_pista Número de la id de la pista
     * @param stamp $fecha_total Fecha total de la reserva
     * @param stamp $dia Día especificado
     * @return Objeto de la reserva
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
     * @param int $id Número de la id del estableciminento
     * @return Objeto con los horarios del establecimiento
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
     * @param stamp $fecha Fecha que especifica el usuario
     * @param stamp $hora Hora que especifica el usuario
     * @param int $id Número de la id de la pista
     * @param int $id Número de la id del usuario
     * @return \Illuminate\View\View Vista con los horarios que el usuario puede reservar
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
     * Devuelve los precios de la pista
     *
     *
     * @author nickGithub
     * @param int $id Número de la id de la pista
     * @return Objeto con los precios de la pista
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
     * @param stamp $finalhour Fecha inicial que especifica el usuario
     * @param stamp $initialhour Fecha final que especifica el usuario
     * @param int $iduser Número de la id del usuario
     * @param stamp $date Fecha final
     * @param int $idpista Número de la id de la pista
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
}
