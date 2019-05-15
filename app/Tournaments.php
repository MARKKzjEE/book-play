<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournaments extends Model
{
    public function establecimiento(){
        return $this->belongsTo('App\Establecimiento', 'id_club', 'id');
    }
    protected $table ='tournaments';
}
