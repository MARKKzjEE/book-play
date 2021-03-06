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
     * @author HolgerCastillo
     * @return \Illuminate\View\View Vista principal de la página web, donde se muestra un formulario
     * donde el usuario puede buscar un establecimiento y los clubes destacados
     */
    public function inicio(){
        $sportTypes  = Deporte::getAllSports();
        $sportsCentersVIP = Establecimiento::getAllClubsVip();
        return view('Homepage',compact('sportsCentersVIP','sportTypes'));
    }
    
    /**
     *
     * Vista de filtros básicos y avanzados de club
     * 
     * Función get que se puede llamar desde la pagina de principal,
     * con los tres filtros básicos: Deporte, ciudad y fecha.
     * Se puede volver a filtrar en la propia vista, añadiendo los filtros avanzados de: Superficie,
     * Cerramiento y Pared de las pistas del club, solo controla método get.
     * No hay ningún parámetro obligatorio.
     *
     * @author ismaelsanchezf
     * @param Request $request Información relativa a la búsqueda del usuario
     * (ciudad,deporte,fecha,cerramiento,superfície,muro)
     * @return \Illuminate\View\View Vista donde se muestran todos los clubes que coinciden 
     * con la búsqueda del usuario
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

}


