<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','imagen_perfil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function reservas(){
        return $this->hasMany("App\Reserva");
    }
    protected $table='users';

    public static function profileinfo($idprofile){
        $profileInfo = DB::table('users')
            ->where('users.id', '=', $idprofile)
            ->get();

        return $profileInfo;
    }
    public static function myTournaments(){
        $myTournaments = DB::table('reserva_tournament')
            ->select('*','reserva_tournament.id as id_reserva')
            ->join('tournaments','tournaments.id','=','reserva_tournament.id_tournament')
            ->join('deporte','deporte.id','=','tournaments.id_deporte')
            ->where('id_usuario',\Auth::user()->id )->get()->toArray();

        return $myTournaments;
    }
    public static function reservasuser($idprofile){

        $reservas = DB::table('reserva')
            ->select('reserva.*','establecimiento.imagen_perfil', 'establecimiento.nombre')
            ->where('id_usuario', '=', $idprofile)
            ->join('pista', 'pista.id', '=', 'reserva.id_pista')
            ->join('establecimiento', 'establecimiento.id', '=', 'pista.id_club')
            ->get();

        return $reservas;
    }
    public static function editprivateprofile($username,$biography,$idprofile){
        $query = DB::table('users')->where('id',$idprofile);
        $return = false;
        if($username != null) {
            $query->update(['username' => $username]);
            $return = true;
        }

        if($biography != null) {
            $query->update(['descripcion'=> $biography]);
            $return = true;
        }
        return $return;
    }

    public static function editpublicprofile($idprofile, $name, $email, $tel, $zip, $city, $adress) {
        $query = \DB::table('users')->where('id',$idprofile);
        $return = false;
        if($name != null) {
            $query->update(['name' => $name]);
            $return = true;
        }

        if($email != null) {
            $query->update(['email'=> $email]);
            $return = true;
        }

        if($tel != null) {
            $query->update(['telefono' => $tel]);
            $return = true;
        }

        if($zip != null) {
            $query->update(['codigo_postal'=> $zip]);
            $return = true;
        }

        if($city != null) {
            $query->update(['ciudad' => $city]);
            $return = true;
        }

        if($adress != null) {
            $query->update(['direccion'=> $adress]);
            $return = true;
        }
        return $return;
    }




}
