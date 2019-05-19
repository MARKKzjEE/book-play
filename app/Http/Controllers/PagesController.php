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


        $tournsSearched = Tournaments::where([
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

        if(is_null($date)){
            $dateArray = getDate();
            $day = $dateArray['mday'];
            $month = $dateArray['mon'];
            $year = $dateArray['year'];
            $date = date_create("$day-$month-$year");
            $date = date_format($date,"d/m/Y");
        }
        
        $sportsCentersSearched = DB::table('establecimiento')->where('prioridad','1')->get();

        return view('Search',compact('city','sport','date','enclosure','surface','wall','sportsCentersSearched'));
    }

}
