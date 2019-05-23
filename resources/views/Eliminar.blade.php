@extends('Template')
@section('Main')

<body>

    <div class="container p-0">

        <div class="row py-5">
            <div class="col-md-5 col-xl-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Eliminar</h5>
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
                                                    <!--<td> <?php// {{$clubs[$i]->direccion}} ?></td>-->
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
                                                <!--<td> <?php// {{$clubs[$i]->direccion}} ?></td>-->
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
                                                <!--<td> <?php// {{$clubs[$i]->direccion}} ?></td>-->
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



                </div>
            </div>



        </div>
    </div>
</body>
