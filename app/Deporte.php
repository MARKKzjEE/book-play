<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{

    public function establecimientos(){
        return $this->belongsToMany("App\Establecimiento")->using(DeportesEstablecimiento::class);
    }
    public static function getAllSports(){
        return Deporte::select('id', 'nombre')->distinct()->get();
    }

    public static function getSportNameById($id){
        return Deporte::where('id',$id)->firstOrfail()->nombre;
    }

    public static function transformIdToGender($gender){
        if($gender == 1){
            $gender = 'Masculino';
        }else if($gender == 2){
            $gender = 'Femenino';
        }else{
            $gender = 'Mixto';
        }
        return $gender;
    }
    protected $table='deporte';
}
