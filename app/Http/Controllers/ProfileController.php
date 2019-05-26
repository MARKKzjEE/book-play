<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Reserva;
use App\Tournaments;
use App\Deporte;
use App\Servicio;
use App\Pista;
use App\DeportesEstablecimiento;
use App\ServiciosEstablecimiento;
use Illuminate\Http\Request;
use DB;
use DateTime;

class ProfileController extends Controller
{
    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function getprofileinfo($idprofile, $return){
        $profileInfo = \DB::table('users')
            ->where('users.id', '=', $idprofile)
            ->get();

        $myTournaments = DB::table('reserva_tournament')
            ->select('*','reserva_tournament.id as id_reserva')
            ->join('tournaments','tournaments.id','=','reserva_tournament.id_tournament')
            ->join('deporte','deporte.id','=','tournaments.id_deporte')
            ->where('id_usuario',\Auth::user()->id )->get()->toArray();
        $reservas = \DB::table('reserva')
            ->select('reserva.*','establecimiento.imagen_perfil', 'establecimiento.nombre')
            ->where('id_usuario', '=', $idprofile)
            ->join('pista', 'pista.id', '=', 'reserva.id_pista')
            ->join('establecimiento', 'establecimiento.id', '=', 'pista.id_club')
            ->get();
        //dd($myTournaments);
        return view('myProfile', compact('profileInfo', 'idprofile', 'return','myTournaments', 'reservas'));
    }

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function editprofileprivate(Request $request, $idprofile){
        $username = $request->input('username');
        $biography = $request->input('biography');

        $query = \DB::table('users')->where('id',$idprofile);
        $return = false;
        if($username != null) {
            $query->update(['username' => $username]);
            $return = true;
        }

        if($biography != null) {
            $query->update(['descripcion'=> $biography]);
            $return = true;
        }

        return $this->getprofileinfo($idprofile, $return);

    }

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function editprofilepublic(Request $request, $idprofile){
        $name = $request->input('name');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $zip = $request->input('zip');
        $city = $request->input('city');
        $adress = $request->input('adress');

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

        return $this->getprofileinfo($idprofile, $return);

    }

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function editpassword(Request $request, $idprofile) {

        $bool = false;
        $bool = false;
        $actualPasswordInput = brypt($request->input('inputPasswordCurrent'));

        $actualPasswordSelect = \DB::table('users')
            ->select('users.password')
            ->where('users.id', '=', $idprofile)
            ->get();

        if($actualPasswordInput == $actualPasswordSelect){
            $bool = true;
        }

        if($request->input('inputPasswordNew') == $request->input('inputPasswordNew2')){
            $newPasswordInput = bcrypt($request->input('inputPasswordNew'));
            $bool2 = true;
        }

        $query = \DB::table('users')->where('id',$idprofile);
        $query->update(['password' => $newPasswordInput]);

        if($bool && $bool2){
            $return = true;
            return $this->getprofileinfo($idprofile, $return);
        }
        else {
            echo '<div style="display:none;" class="card-title mb-0 msgUpdate"><p><b>Contraseña actual o comprobación de la nueva contraseña erroneas.</b></p></div>';
        }


    }

    /**
     *
     * Descripción básica (1 linea)
     *
     * Descripción detallada
     *
     * @author nickGithub
     */
    public function deleteaccount(Request $request, $idprofile) {

        if($request->has('ok')){
            $query = \DB::table('users')->where('id',$idprofile);
            $query->delete();
            echo '<div style="display:none;" class="card-title mb-0 msgUpdate"><p><b>Cuenta eliminada!</b></p></div>';

        }
        else if($request->has('no')){
            return $this->getprofileinfo($idprofile, false);
        }

    }

    /**
     *
     * Elimina la reserva seleccionada
     *
     * Devuelve la vista del perfil de usuario con la
     * lista de reservas actualizada
     *
     * @author ArnauRovira
     */
    public function deletebook($idbook, $idprofile) {

        Reserva::deletebook($idbook, $idprofile);
        return $this->getprofileinfo($idprofile, false);
    }
}
