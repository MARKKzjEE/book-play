<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Reserva;
use App\Tournaments;
use App\Deporte;
use App\Servicio;
use App\Pista;
use App\User;
use App\DeportesEstablecimiento;
use App\ServiciosEstablecimiento;
use Illuminate\Http\Request;
use DB;
use DateTime;

class ProfileController extends Controller
{
    /**
     *
     * Devuelve datos del perfil
     *
     * Recupera y retorna los datos del perfil
     * con el que se ha iniciado sesión.
     * @author MarcGallego
     * @param int $idprofile Contiene la id del perfil del usuario
     * @param bool $return Booleano para controlar vista resultante
     * @return \Illuminate\View\View Vista del perfil con la información completa
     */
    public function getprofileinfo($idprofile, $return){
        $profileInfo = User::profileinfo($idprofile);
        $myTournaments = User::myTournaments();
        $reservas = User::reservasuser($idprofile);
        //dd($myTournaments);
        return view('myProfile', compact('profileInfo', 'idprofile', 'return','myTournaments', 'reservas'));
    }

    /**
     *
     * Modifica los datos privados
     *
     * Introducción de los nuevos datos para modificarlos
     * y recuperarlos.
     *
     * @author MarcGallego
     * @param Request $request Petición con la información privada de nombre de usuario y la biografía
     * @param int $idprofile Contiene la id del perfil del usuario
     * @return \Illuminate\View\View Vista del perfil con la información completa
     */
    public function editprofileprivate(Request $request, $idprofile){
        $username = $request->input('username');
        $biography = $request->input('biography');

        $return = User::editprivateprofile($username,$biography,$idprofile);

        return $this->getprofileinfo($idprofile, $return);

    }

    /**
     *
     * Modifica los datos públicos
     *
     * Introducción de los nuevos datos para modificarlos
     * y recuperarlos.
     *
     * @author MarcGallego
     * @param Request $request Petición con la información pública de nombre, email, teléfono, código, postal, ciudad
     * y dirección
     * @param int $idprofile Contiene la id del perfil del usuario
     * @return \Illuminate\View\View Vista del perfil con la información editada
     */
    public function editprofilepublic(Request $request, $idprofile){
        $name = $request->input('name');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $zip = $request->input('zip');
        $city = $request->input('city');
        $adress = $request->input('adress');

        $return = User::editpublicprofile($idprofile, $name, $email, $tel, $zip, $city, $adress);

        return $this->getprofileinfo($idprofile, $return);

    }

    /**
     *
     * Modifica las contraseñas
     *
     * Introducción de la nueva contraseña
     *
     *
     * @author MarcGallego
     * @param Request $request Petición con la contraseña que introduce el usuario
     * @param int $idprofile Contiene la id del perfil del usuario
     * @return \Illuminate\View\View Vista del perfil con la información editada
     */
    public function editpassword(Request $request, $idprofile) {

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
     * Elimina la cuenta actual
     *
     * Elimina por completo la cuenta perdiendo todos los datos
     *
     * @author MarcGallego
     * @param Request $request Petición con la confirmación del usuario de Sí o No
     * @param int $idprofile Contiene la id del perfil del usuario
     * @return \Illuminate\View\View Vista con la confirmación de la eliminación de la cuenta
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
     * @author MarcGallego
     * @param int $idbook Id de la reserva
     * @param int $idprofile Contiene la id del perfil del usuario
     * @return \Illuminate\View\View Vista del perfil con toda la información
     */
    public function deletebook($idbook, $idprofile) {

        Reserva::deletebook($idbook, $idprofile);
        return $this->getprofileinfo($idprofile, false);
    }
}
