@extends('Template')
@section('Main')

<body onload="fadeIn({{$return}})">
    <style type="text/css">
        .card {
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
        }
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e5e9f2;
            border-radius: .2rem;
        }
        .card-header:first-child {
            border-radius: calc(.2rem - 1px) calc(.2rem - 1px) 0 0;
        }
        .card-header {
            border-bottom-width: 1px;
        }
        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            color: inherit;
            background-color: #fff;
            border-bottom: 1px solid #e5e9f2;
        }
        label {
            cursor: text;
        }
        .msgUpdate {
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
        }
    </style>
    <?php
            foreach($profileInfo as $infoItem){
                $informacion = $infoItem;
            }

    ?>
    <div class="container p-0">

        <div class="row py-5">
            <div class="col-md-5 col-xl-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Configuración del Perfil</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                            Mi cuenta
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#editaccount" role="tab">
                            Editar Cuenta
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                            Contraseña
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#delete" role="tab">
                            Eliminar cuenta
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#myTournaments" role="tab">
                            Mis torneos
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#misreservas" role="tab">
                            Mis reservas
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-7 col-xl-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <?php
                            echo '<div style="display:none;" class="card-title mb-0 msgUpdate"><p><b>Información Actualizada!</b></p></div>';
                        ?>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Información Pública</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="inputUsername">Nombre de Usuario</label>
                                                <label class="form-control"><?php echo $informacion->username ?></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUsername">Descripción</label>
                                                <label rows="2" class="form-control"><?php echo $informacion->descripcion ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Información Privada</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="inputName">Nombre Completo</label>
                                        <label class="form-control"><?php echo $informacion->name ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4">Correo</label>
                                        <label class="form-control"><?php echo $informacion->email ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Dirección</label>
                                        <label class="form-control"><?php echo $informacion->direccion ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Teléfono</label>
                                        <label class="form-control"><?php echo $informacion->telefono ?></label>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Ciudad</label>
                                            <label class="form-control"><?php echo $informacion->ciudad ?></label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputZip">Código Postal</label>
                                            <label class="form-control"><?php echo $informacion->codigo_postal ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputZip">Cuenta Verificada</label>
                                        <label class="form-control">
                                            <?php
                                                if($informacion->verificacion_mail == 1)
                                                    echo "Sí!";
                                                else
                                                    echo "No verificada.";
                                            ?>
                                        </label>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade show" id="editaccount" role="tabpanel">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Información Pública</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{URL::to('/editprofileprivate/')}}/{{$idprofile}}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nombre de usuario</label>
                                                <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Ej: carloslopez7">
                                            </div>
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea name="biography" rows="2" class="form-control" id="inputBio" placeholder="Explica algo sobre ti."></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Información Privada</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{URL::to('/editprofilepublic/')}}/{{$idprofile}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputFirstName">Nombre Completo</label>
                                        <input name="name" type="text" class="form-control" id="inputFirstName" placeholder="Ej: Carlos López Sánchez">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail4">Correo</label>
                                        <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Ej: carloslopez@dominio.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Dirección</label>
                                        <input name="adress" type="text" class="form-control" id="inputAddress" placeholder="Ej: Paseo de Gracia 240">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress2">Teléfono</label>
                                        <input name="tel" type="tel" class="form-control" id="inputAddress2" placeholder="Ej: 612345678">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Ciudad</label>
                                            <input name="city" type="text" class="form-control" id="inputCity" placeholder="Ej: Barcelona">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputZip">Código Postal</label>
                                            <input name="zip" type="number" class="form-control" id="inputZip" placeholder="Ej: 08040">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cambia tu contraseña</h5>

                                <form method="post" action="{{URL::to('/editpassword/')}}/{{$idprofile}}">
                                    <div class="form-group">
                                        <label name="inputPasswordCurrent">Contraseña actual</label>
                                        <input type="password" class="form-control" id="inputPasswordCurrent" required>
                                        <small><a href="#">Se olvidó la contraseaña?</a></small>
                                    </div>
                                    <div class="form-group">
                                        <label name="inputPasswordNew">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="inputPasswordNew" required>
                                    </div>
                                    <div class="form-group">
                                        <label name="inputPasswordNew2">Comprueba la contraseña</label>
                                        <input type="password" class="form-control" id="inputPasswordNew2" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delete" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">¿Está seguro que quiere borrar su cuenta?</h5>

                                <form method="get" action="{{URL::to('/deleteaccount/')}}/{{$idprofile}}">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <button type="submit" name="ok" class="btn btn-primary">Sí</button>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <button type="submit" name="no" class="btn btn-primary">No</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding-top: 100px">

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="myTournaments" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h3 class="card-title"> Torneos inscritos </h3>
                                    <p> Aquí se muestran todas las incripciones a los torneos que ha realizado.
                                    Para desapuntarse de alguno solo ha de pulsar sobre el icono de eliminar </p>
                                    <div class="table-responsive">          
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th> Nombre </th>
                                                    <th> Fecha </th>
                                                    <th> Deporte </th>
                                                    <th> Genero </th>
                                                    <th> Nº reservas </th>
                                                    <th>  </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @for ($i = 0; $i < sizeof($myTournaments); $i++)

                                                    <tr>
                                                        <td> {{$myTournaments[$i]->name}} </td>
                                                        <td> {{$myTournaments[$i]->fecha}} </td>
                                                        <td> {{$myTournaments[$i]->nombre}} </td>
                                                        <td> {{$myTournaments[$i]->genero}} </td>
                                                        <td> {{$myTournaments[$i]->num_inscripciones}} </td>
                                                        <td> <a href="{{ route('unsuscribeTournament', [$myTournaments[$i]->id_reserva, $myTournaments[$i]->id_tournament, $myTournaments[$i]->num_inscripciones]) }}"> <i class="fas fa-minus-circle"> </i> </a>  </td>

                                                        
                                                    </tr>


                                                @endfor 

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                

                              
                                


                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="misreservas" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Mis reservas</h3>
                                <p> Aquí se muestran todas las reservas que se han realizado.
                                    Para desapuntarse de alguna solo ha de pulsar sobre el icono de eliminar </p>
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                        <tr>

                                            <th> Nombre </th>
                                            <th> Fecha </th>
                                            <th> Hora </th>


                                            <th>  </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($reservas as $reserva)
                                            <?php
                                            $datetime = explode(" ",$reserva->hora_inicio);
                                            $datetimefinal = explode(" ",$reserva->hora_final);


                                            ?>
                                            <tr>

                                                <td> {{$reserva->nombre}} </td>
                                                <td> {{$datetime[0] }} </td>
                                                <td> {{substr($datetime[1],0,-3)." - ".substr($datetimefinal[1],0,-3)}} </td>


                                                <td> <a href="{{ route('deletebook') }}/{{$reserva->id}}/{{$idprofile}}"> <i class="fas fa-minus-circle"> </i> </a>  </td>


                                            </tr>


                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    




                </div>
            </div>
        </div>

    </div>
    </body>

    <script>
        function fadeIn($return){
            if($return == true){
                $('#msgUpdate').fadeIn('slow', function(){
                    $('#msgUpdate').delay(3000).fadeOut();
                });
            }
        }
    </script>

@endsection