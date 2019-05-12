<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PagesController extends Controller
{
    public function perfil(){
        return view('profile');
    }
    public function inicio(){
        return view('Homepage');
    }

    public function fotos(){
        return view('fotos');
    }

    public function noticias(){
        return view('blog');
    }

    public function nosotros($nombre = null){
        
        $equipo = ['melo','klkl','prediro'];
        return view('nosotros',compact('equipo','nombre') );
    }

    public function form(Request $request){
        print_r($request->input('ciudad'));
        echo "<br>";
        print_r($request->input('deporte'));
        echo "<br>";
        print_r($request->input('fecha'));
        print_r(gettype($request->input('fecha')));
        echo "<br>";
        
        if($request->input('fecha') == ""){
            $fechaArray = getDate();
            $dia = $fechaArray['mday'];
            $mes = $fechaArray['mon'];
            $año = $fechaArray['year'];
            $fecha = date_create("$dia-$mes-$año");
            echo date_format($fecha,"m/d/Y");
            echo "_1<br>";
            echo gettype($fecha);
            echo "_2<br>";
        }
        else{
            $fecha = $request->input('fecha');
            echo gettype($fecha);
            echo "_3<br>";
            echo date_format($fecha,"m/d/Y");
            echo "_4<br>";
            print($fechaArray);
            echo "_5<br>";
        }
        
    }

}
