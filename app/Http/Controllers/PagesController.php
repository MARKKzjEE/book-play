<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PagesController extends Controller
{
    public function inicio(){
        return view('Homepage');
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

    public function club(){

        


        return view('Club');
    }

    public function tournament(){
        return view('Tournament');
    }

    public function registerTournament(){
        return view('RegisterTournament');
    }



    public function search(Request $request){
        $city = $request->input('city');
        $sport = $request->input('sport');
        $date = $request->input('date');
        //Date format: month/day/year
        if(is_null($date)){
            $dateArray = getDate();
            $day = $dateArray['mday'];
            $month = $dateArray['mon'];
            $year = $dateArray['year'];
            $date = date_create("$day-$month-$year");
            $date = date_format($date,"m/d/Y");
        }
        return view('Search',compact('city','sport','date'));
    }

}
