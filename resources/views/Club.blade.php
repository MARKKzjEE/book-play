@extends('Template')
@section('Main')
    <!-- Top content / Advanced search -->
    <header class="masthead2" style="background-image: url({{ asset('img/'.$center->imagen_perfil) }});" >
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white text-left">
                    <h3 class="font-weight-normal"> {{ $center->nombre }} </h3>
                    <h5 class="font-weight-normal"> {{ $center->direccion }} </h5>
                </div>
            </div>
        </div>
    </header>
    

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <hr>
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ asset('img/'.$center->imagen_perfil) }}" alt="{{$center->imagen_perfil}}">
                <hr>
                <!-- Post Content -->
                                
                <h3 class="lead text-justify font-weight-bold"> <i class="fas fa-hotel mr-2"></i> {{ $center->nombre}} </h3>
                <h3 class="lead text-justify font-weight-bold"> <i class="fas fa-map-marked-alt mr-2"></i> {{ $center->direccion}} </h3>
                <h3 class="lead text-justify font-weight-bold"> <i class="fas fa-phone-volume mr-3"></i> {{ $center->telefono}} </h3>
                <hr>
                <h5 class="text-muted text-justify"> {{ $center->descripcion}} </h5>
                



                <br>
                <br>
                @if(Auth::check())
                    <a href="{{route('timetable')}}/<?php echo $center->id . "/" . \Auth::user()->id ?> "> <button type="button" class="btn btn-primary btn-lg btn-block"> Reservar </button> </a>
                @else
                    <a href="{{route('login')}}"> <button type="button" class="btn btn-primary btn-lg btn-block"> Reservar </button> </a>
                @endif
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-primary text-white"> Deportes  </h5>
                    <div class="card-body">

                    @foreach($sports as $sport)
                        <div class="input-group">
                        <img class="img-fluid rounded mb-2" src="{{ asset('img/sports/'. $sport->id_imagen )}}" style="width:35px!important; height:30px!important;"  >
                            <p class="pl-5 pb-2" > {{ $sport->nombre }} </p>
                        </div>
                    @endforeach

                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-primary text-white"> Servicios </h5>
                    <div class="card-body">

                        @foreach($services as $service)
                            <div class="input-group">
                                <img class="img-fluid rounded mb-2" src="{{ asset('img/services/'. $service->id_imagen )}}" style="width:35px!important; height:30px!important;" >
                                <p class="pl-5" > {{ $service->nombre }} </p>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Schedule Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-primary text-white"> Horarios </h5>
                    <div class="card-body">
                        <?php $weekdays = [ 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo' ]; ?>
                        <!--Table-->
                        <table class="table w-auto">
                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th>Dia</th>
                                    <th>Apertura</th>
                                    <th>Clausura</th>
                                </tr>
                            </thead>
                            <!--Table head-->
                            <!--Table body-->
                            <tbody>
                                @foreach($weekdays as $day)
                                    <tr>
                                        <td>{{ $day }}:</td>
                                        <td><?php echo date('H:i',strtotime($center->hora_inicio)); ?></td>
                                        <td><?php echo date('H:i',strtotime($center->hora_final)); ?></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>
                </div>
            </div> <!-- /.sidebar -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    



@endsection