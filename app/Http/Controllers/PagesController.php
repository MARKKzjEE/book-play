<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;



class PagesController extends Controller
{
    public function inicio(){
        $sportsCenters = DB::table('establecimiento')->where('prioridad','1')->get();
        return view('Homepage',compact('sportsCenters'));
    }

    /*
    public function nosotros($nombre = null){    
        $equipo = ['melo','klkl','prediro'];
        return view('nosotros',compact('equipo','nombre') );
    }
    */

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


        return view('Club',compact('ID'));
    }

    public function tournament(){
        return view('Tournament');
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

        return view('Search',compact('city','sport','date','enclosure','surface','wall'));
    }

}
