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
}
