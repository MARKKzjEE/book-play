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

        <div class="row">
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
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img src="{{ URL::asset('img/profiles/'.$informacion->imagen_perfil) }}" class="rounded-circle img-responsive mt-2" width="128" height="128">
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
                                                    echo "No verificada. Revisa el correo.";
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
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img src="{{ URL::asset('img/profiles/'.$informacion->imagen_perfil) }}" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                                <div class="mt-2">
                                                    <span class="btn btn-primary"><svg class="svg-inline--fa fa-upload fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="upload" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><!-- <i class="fas fa-upload"></i> --> Upload</span>
                                                </div>
                                                <small>Introduce una imagen de tamaño y formato 128px de 128px en .jpg format</small>
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