@extends('Template')
@section('Main')

<body>

    <div class="container p-0">

        <div class="row py-5">
            <div class="col-md-5 col-xl-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Admin tools</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#Clubs" role="tab">
                            Eliminar Clubs
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#Deportes" role="tab">
                            Eliminar Deportes
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#Servicios" role="tab">
                            Eliminar servicios
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#pistas" role="tab">
                            Eliminar pistas
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#torneos" role="tab">
                            Eliminar torneos
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#Clubsi" role="tab">
                            Insertar Clubs
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#Deportesi" role="tab">
                            Insertar Deportes
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#Serviciosi" role="tab">
                            Insertar servicios
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#Pistasi" role="tab">
                            Insertar pistas
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#Torneosi" role="tab">
                            Insertar torneos
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-xl-8">
                <div class="tab-content">
                    <div class="tab-pane fade" id="Clubs" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h3 class="card-title"> Todos los torneos </h3>
                                    <p> Aquí se muestran todos los clubs que hay en la Base de Datos.
                                        Para eliminar alguno solo hay que pulsar sobre el icono eliminar </p>
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Nombre </th>
                                                <!--<th> Dirección </th>-->
                                                <th>  </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @for ($i = 0; $i < sizeof($clubs); $i++)
                                                <tr>
                                                    <td> {{$clubs[$i]->id}} </td>
                                                    <td> {{$clubs[$i]->nombre }} </td>
                                                    <td> <a href="{{ route('deleteClub', [$clubs[$i]->id ]) }}"> <i class="fas fa-minus-circle"> </i> </a>  </td>


                                                </tr>


                                            @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Deportes" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h3 class="card-title"> Todos los deportes </h3>
                                    <p> Aquí se muestran todos los deportes que hay en la Base de Datos.
                                        Para eliminar alguno solo hay que pulsar sobre el icono eliminar </p>
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Deporte </th>
                                                <!--<th> Dirección </th>-->
                                                <th>  </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @for ($i = 0; $i < sizeof($deportes); $i++)
                                                <tr>
                                                    <td> {{$deportes[$i]->id}} </td>
                                                    <td> {{$deportes[$i]->nombre }} </td>
                                                
                                                    <td> <a href="{{ route('deleteDeporte', [$deportes[$i]->id ]) }}"> <i class="fas fa-minus-circle"> </i> </a>  </td>


                                                </tr>


                                            @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Servicios" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h3 class="card-title"> Todos los servicios </h3>
                                    <p> Aquí se muestran todos los servicios que hay en la Base de Datos.
                                        Para eliminar alguno solo hay que pulsar sobre el icono eliminar </p>
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Servicio </th>
                                                <!--<th> Dirección </th>-->
                                                <th>  </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @for ($i = 0; $i < sizeof($servicios); $i++)
                                                <tr>
                                                    <td> {{$servicios[$i]->id}} </td>
                                                    <td> {{$servicios[$i]->nombre }} </td>
                                                
                                                    <td> <a href="{{ route('deleteServicio', [$servicios[$i]->id ]) }}"> <i class="fas fa-minus-circle"> </i> </a>  </td>


                                                </tr>


                                            @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pistas" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h3 class="card-title"> Todas las pistas </h3>
                                    <p> Aquí se muestran todas las pistas que hay en la Base de Datos.
                                        Para eliminar alguno solo hay que pulsar sobre el icono eliminar </p>
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Nombre </th>
                                                <th> Id Club </th>
                                                <th>  </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @for ($i = 0; $i < sizeof($pistas); $i++)
                                                <tr>
                                                    <td> {{$pistas[$i]->id}} </td>
                                                    <td> {{$pistas[$i]->nombre }} </td>
                                                    <td> {{$pistas[$i]->id_club}}</td>
                                                    <td> <a href="{{ route('deletePista', [$pistas[$i]->id ]) }}"> <i class="fas fa-minus-circle"> </i> </a>  </td>


                                                </tr>


                                            @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="torneos" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <h3 class="card-title"> Todos los torneos </h3>
                                    <p> Aquí se muestran todos los torneos que hay en la Base de Datos.
                                        Para eliminar alguno solo hay que pulsar sobre el icono eliminar </p>
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Nombre </th>
                                                <th> Id Club </th>
                                                <th> Id Deporte </th>
                                                <th>  </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @for ($i = 0; $i < sizeof($torneos); $i++)
                                                <tr>
                                                    <td> {{$torneos[$i]->id}} </td>
                                                    <td> {{$torneos[$i]->name }} </td>
                                                    <td> {{$torneos[$i]->id_club}}</td>
                                                    <td> {{$torneos[$i]->id_deporte}}</td>
                                                    <td> <a href="{{ route('deleteTorneo', [$torneos[$i]->id ]) }}"> <i class="fas fa-minus-circle"> </i> </a>  </td>


                                                </tr>


                                            @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Clubsi" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="container-fluid">
                                        <div class="row no-gutter">
                                            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"> </div>
                                            <div class="col-md-8 col-lg-6">
                                                <div class="login d-flex align-items-center py-5">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-9 col-lg-8 mx-auto">
                                                                <h3 class="login-heading mb-4"> Añade un Club </h3>
                                                                <form method="POST" action="/insertClub">
                                                                @csrf
                                                                    <!-- Email input -->
                                                                    <div class="form-label-group">
                                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required autofocus>
                                                                        <label for="email"> Email </label>
                                                                        @if ($errors->has('email'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('email') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Name input -->
                                                                    <div class="form-label-group">
                                                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nombre" required autofocus>
                                                                        <label for="name"> Nombre </label>
                                                                        @if ($errors->has('name'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('name') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>

                                                                    <!-- Direction input -->
                                                                    <div class="form-label-group">
                                                                        <input id="direction" type="text" class="form-control{{ $errors->has('direction') ? ' is-invalid' : '' }}" name="direction" placeholder="Dirección" required autofocus>
                                                                        <label for="direction"> Dirección </label>
                                                                        @if ($errors->has('direction'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('direction') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Código Postal input -->
                                                                    <div class="form-label-group">
                                                                        <input id="cp" type="number" class="form-control{{ $errors->has('cp') ? ' is-invalid' : '' }}" name="cp" placeholder="Código Postal" required autofocus>
                                                                        <label for="cp"> Código Postal </label>
                                                                        @if ($errors->has('cp'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('cp') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Teléfono input -->
                                                                    <div class="form-label-group">
                                                                        <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Teléfono" required autofocus>
                                                                        <label for="phone"> Teléfono </label>
                                                                        @if ($errors->has('phone'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Prioridad input -->
                                                                    <div class="form-label-group">
                                                                        <input id="priority" type="number" class="form-control{{ $errors->has('priority') ? ' is-invalid' : '' }}" name="priority" placeholder="Prioridad" required autofocus>
                                                                        <label for="priority"> Prioridad </label>
                                                                        @if ($errors->has('priority'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('priority') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Descripcion input -->
                                                                    <div class="form-label-group">
                                                                        <input id="desctription" type="text" class="form-control{{ $errors->has('desctription') ? ' is-invalid' : '' }}" name="desctription" placeholder="Descripcion" required autofocus>
                                                                        <label for="desctription"> Descripcion </label>
                                                                        @if ($errors->has('desctription'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('desctription') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Imagen Perfil input -->
                                                                    <div class="form-label-group">
                                                                        <input id="img_profile" type="text" class="form-control{{ $errors->has('img_profile') ? ' is-invalid' : '' }}" name="img_profile" placeholder="Imagen Perfil" required autofocus>
                                                                        <label for="img_profile"> Imagen Perfil </label>
                                                                        @if ($errors->has('img_profile'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('img_profile') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Hora Inicio input -->
                                                                    <div class="form-label-group">
                                                                        <input id="hora_init" type="time" class="form-control{{ $errors->has('hora_init') ? ' is-invalid' : '' }}" name="hora_init" placeholder="Hora Inicio" required autofocus>
                                                                        <label for="hora_init"> Hora Inicio </label>
                                                                        @if ($errors->has('hora_init'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('hora_init') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Hora Fin input -->
                                                                    <div class="form-label-group">
                                                                        <input id="hora_end" type="time" class="form-control{{ $errors->has('hora_end') ? ' is-invalid' : '' }}" name="hora_end" placeholder="Hora Final" required autofocus>
                                                                        <label for="hora_end"> Hora Final </label>
                                                                        @if ($errors->has('hora_end'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('hora_end') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>

                                                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"> Registra </button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Torneosi" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="container-fluid">
                                        <div class="row no-gutter">
                                            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"> </div>
                                            <div class="col-md-8 col-lg-6">
                                                <div class="login d-flex align-items-center py-5">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-9 col-lg-8 mx-auto">
                                                                <h3 class="login-heading mb-4"> Añade un Torneo </h3>
                                                                <form method="POST" action="/insertTournament">
                                                                @csrf
                                                                    <!-- Name input -->
                                                                    <div class="form-label-group">
                                                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nombre" required autofocus>
                                                                        <label for="name"> Nombre </label>
                                                                        @if ($errors->has('name'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('name') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Club input -->
                                                                    <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                        <select class="custom-select mr-sm-2 form-control " name="clubs">
                                                                            @foreach($clubes as $club)
                                                                                <option value="{{$club->id}}">{{$club->nombre}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!-- Email input -->
                                                                    <div class="form-label-group">
                                                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required autofocus>
                                                                        <label for="email"> Email </label>
                                                                        @if ($errors->has('email'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('email') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Sport input -->
                                                                    <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                        <select class="custom-select mr-sm-2 form-control " name="sports">
                                                                            @foreach($sports as $sport)
                                                                                <option value="{{$sport->id}}">{{$sport->nombre}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!-- Gender input -->
                                                                    <div class="form-label-group">
                                                                        <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" placeholder="Género" required autofocus>
                                                                        <label for="gender"> Género </label>
                                                                        @if ($errors->has('gender'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('gender') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- date input -->
                                                                    <div class="form-label-group">
                                                                        <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" placeholder="Fecha" required autofocus>
                                                                        <label for="date"> Fecha </label>
                                                                        @if ($errors->has('date'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('date') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- precio input -->
                                                                    <div class="form-label-group">
                                                                        <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Precio" required autofocus>
                                                                        <label for="price"> Precio </label>
                                                                        @if ($errors->has('price'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('price') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- Prioridad input -->
                                                                    <div class="form-label-group">
                                                                        <input id="priority" type="number" class="form-control{{ $errors->has('priority') ? ' is-invalid' : '' }}" name="priority" placeholder="Prioridad" required autofocus>
                                                                        <label for="priority"> Prioridad </label>
                                                                        @if ($errors->has('priority'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('priority') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- num_participantes_max input -->
                                                                    <div class="form-label-group">
                                                                        <input id="num_par_max" type="number" class="form-control{{ $errors->has('num_par_max') ? ' is-invalid' : '' }}" name="num_par_max" placeholder="Participantes máximos" required autofocus>
                                                                        <label for="num_par_max"> Participantes máximos </label>
                                                                        @if ($errors->has('num_par_max'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('num_par_max') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <!-- num_participantes_actual input -->
                                                                    <div class="form-label-group">
                                                                        <input id="num_par_act" type="number" class="form-control{{ $errors->has('num_par_act') ? ' is-invalid' : '' }}" name="num_par_act" placeholder="Participantes actuales" required autofocus>
                                                                        <label for="num_par_act"> Participantes actuales </label>
                                                                        @if ($errors->has('num_par_act'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('num_par_act') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>

                                                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"> Registra </button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Deportesi" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="container-fluid">
                                        <div class="row no-gutter">
                                            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"> </div>
                                            <div class="col-md-8 col-lg-6">
                                                <div class="login d-flex align-items-center py-5">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-9 col-lg-8 mx-auto">
                                                                <h3 class="login-heading mb-4"> Añade un deporte al club </h3>
                                                                <form method="POST" action="/insertSport">
                                                                @csrf
                                                                    <!-- Sport input -->
                                                                    <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                        <select class="custom-select mr-sm-2 form-control " name="sports">
                                                                            @foreach($sports as $sport)
                                                                                <option value="{{$sport->id}}">{{$sport->nombre}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!-- Club input -->
                                                                    <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                        <select class="custom-select mr-sm-2 form-control " name="clubs">
                                                                            @foreach($clubes as $club)
                                                                                <option value="{{$club->id}}">{{$club->nombre}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"> Registra </button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Serviciosi" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row no-gutter">
                                        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"> </div>
                                        <div class="col-md-8 col-lg-6">
                                            <div class="login d-flex align-items-center py-5">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-9 col-lg-8 mx-auto">
                                                            <h3 class="login-heading mb-4"> Registra un servicio </h3>
                                                            <form method="POST" action="/insertService">
                                                            @csrf
                                                                <!-- Service input -->
                                                                <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                    <select class="custom-select mr-sm-2 form-control " name="services">
                                                                        @foreach($services as $service)
                                                                            <option value="{{$service->id}}">{{$service->nombre}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!-- Club input -->
                                                                <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                    <select class="custom-select mr-sm-2 form-control " name="clubs">
                                                                        @foreach($clubes as $club)
                                                                            <option value="{{$club->id}}">{{$club->nombre}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"> Enviar petición </button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="Pistasi" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row no-gutter">
                                        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"> </div>
                                        <div class="col-md-8 col-lg-6">
                                            <div class="login d-flex align-items-center py-5">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-9 col-lg-8 mx-auto">
                                                            <h3 class="login-heading mb-4"> Registra una pista </h3>
                                                            <form method="POST" action="/createPista">
                                                            @csrf
                                                            <!-- Name input -->
                                                                <div class="form-label-group">
                                                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nombre" required autofocus>
                                                                    <label for="name"> Nombre </label>
                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                                <!-- Superficie input -->
                                                                <div class="form-label-group">
                                                                    <input id="superficie" type="text" class="form-control{{ $errors->has('superficie') ? ' is-invalid' : '' }}" name="superficie" placeholder="Superficie" required autofocus>
                                                                    <label for="superficie"> Superficie </label>
                                                                    @if ($errors->has('superficie'))
                                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('superficie') }}</strong>
                                            </span>
                                                                    @endif
                                                                </div>

                                                                <!-- Cerramiento input -->
                                                                <div class="form-label-group">
                                                                    <input id="cerramiento" type="text" class="form-control" name="cerramiento" placeholder="Cerramiento" required autofocus>
                                                                    <label for="cerramiento"> Cerramiento </label>
                                                                    @if ($errors->has('cerramiento'))
                                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cerramiento') }}</strong>
                                            </span>
                                                                    @endif
                                                                </div>

                                                                <!-- Wall input -->
                                                                <div class="form-label-group">
                                                                    <input id="wall" type="text" class="form-control{{ $errors->has('wall') ? ' is-invalid' : '' }}" name="wall" placeholder="Wall" required autofocus>
                                                                    <label for="wall"> Wall </label>
                                                                    @if ($errors->has('wall'))
                                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('wall') }}</strong>
                                            </span>
                                                                    @endif

                                                                </div>
                                                                <!-- Wall input -->
                                                                <div class="form-label-group">
                                                                    <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" placeholder="Price" required autofocus>
                                                                    <label for="price"> Price </label>
                                                                    @if ($errors->has('price'))
                                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                                                    @endif

                                                                </div>
                                                                <!-- Sport input -->
                                                                <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                    <select class="custom-select mr-sm-2 form-control " name="sports">
                                                                        @foreach($sports as $sport)
                                                                            <option value="{{$sport->id}}">{{$sport->nombre}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!-- Club input -->
                                                                <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                                                    <select class="custom-select mr-sm-2 form-control " name="clubs">
                                                                        @foreach($clubes as $club)
                                                                            <option value="{{$club->id}}">{{$club->nombre}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"> Enviar petición </button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</body>
@endsection