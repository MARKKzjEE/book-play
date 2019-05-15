<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Tournaments;
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

        //$sportsCenters = DB::table('establecimiento')->where('id',$ID)->get();
        //$center = $sportsCenters[0];
        /** @var Establecimiento $center */
        $center = Establecimiento::where('id', $ID)->firstOrFail();
        /** @var Establecimiento $center */
        $pistas = $center->pistas;
        $sports = DB::table('deportes_establecimiento')->where('id_club',$ID)->get();
        $services = DB::table('servicios_establecimiento')->where('id_club',$ID)->get();

        $sportsNames = array();
        $servicesNames = array();

        foreach($sports as $sport){
            $sportsClub = DB::table('deporte')->where('id',$sport->id_deporte)->get();
            array_push($sportsNames,[$sportsClub[0]->nombre,$sportsClub[0]->id_imagen]);
        }

        foreach($services as $service){
            $servicesClub = DB::table('servicio')->where('id',$service->id_servicio)->get();
            array_push($servicesNames,[$servicesClub[0]->nombre,$servicesClub[0]->id_imagen]);
        }

        return view('Club',compact('center','sportsNames','servicesNames'));
    }
    public function tournaments(){
        $tournaments=Tournaments::all();
        return view('tournament',compact('tournaments'));

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

        //Date format: month/day/year
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
