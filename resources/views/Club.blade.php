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
                <p class="lead"> {{ $center->descripcion}} </p>
                <hr>
                <a href="{{route('timetable')}}/<?php echo $center->id . "/2" ?> "> <button type="button" class="btn btn-primary btn-lg btn-block"> Reservar </button> </a>
                
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-dark text-white"> Deportes  </h5>
                    <div class="card-body">

                    @foreach($sportsNames as $name)
                        <div class="input-group">
                        <img class="img-fluid rounded mb-2" src="{{ asset('img/sports/'.$name[1] )}}" alt="" width="35px" height="10px" >
                            <p class="pl-5 pb-2" > {{ $name[0] }} </p>
                        </div>
                    @endforeach

                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-dark text-white"> Servicios </h5>
                    <div class="card-body">

                        @foreach($servicesNames as $name)
                            <div class="input-group">
                                <img class="img-fluid rounded mb-2" src="{{ asset('img/services/'. $name[1] )}}" alt="" width="35px" height="10px" >
                                <p class="pl-5" > {{ $name[0] }} </p>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Schedule Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-dark text-white"> Horarios </h5>
                    <div class="card-body">
                        <?php $weekdays = [ 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo' ]; ?>
                        @foreach($weekdays as $day)
                            <div class="input-group">
                                <p class="pl-2" > {{ $day }} </p>
                                <p class="pl-5 pr-5"> - </p>
                                <p class="pl-2" > <?php echo date('H:i',strtotime($center->hora_inicio)); ?>  </p>
                                <p class="pl-2" > <?php echo date('H:i',strtotime($center->hora_final)); ?>  </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- /.sidebar -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection