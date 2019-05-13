<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{

    public function galeria(){
        return $this->belongsTo('App\Galeria');
    }
    protected $table ='archivo';
}
