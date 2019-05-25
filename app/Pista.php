<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pista extends Model
{

    public function reservas(){
        return $this->hasMany("App\Reserva");
    }
    public function deporte(){
        return $this->hasOne('App\Deporte');
    }
    public function establecimiento(){
        return $this->belongsTo('App\Establecimiento', 'id_club', 'id');
    }

    public static function getAllPistas(){
        return Pista::select('id','nombre','id_club','id_deporte')->distinct()->get();
    }

    public static function deleteField($id){
        DB::table('pista')
            ->where('id',$id)->delete();
    }

    protected $table ='pista';
}
