<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Servicio extends Model
{
    public $timestamps = false;
    public function establecimientos(){
        return $this->belongsToMany("App\Establecimiento")->using(ServiciosEstablecimiento::class);
    }

    public static function getAllServices(){
        return Servicio::select('id','nombre')->distinct()->get();
    }

    public static function deleteService($id){
        DB::table('servicio')
            ->where('id',$id)->delete();
    }

    protected $table='servicio';
}
