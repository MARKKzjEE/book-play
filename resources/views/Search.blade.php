@extends('Template')

@section('Main')
    
    <!-- Top content / Advanced search -->
    <div class="position-relative overflow-hidden p-3 p-md-1 m-md-2 text-left">
        <div class="col-md-12 p-lg-1 mx-auto my-1 align-items-center ">
            
            <form method="get" action="{{URL::to('/search')}}">
                {{ csrf_field() }}
                <div class="form-row d-flex d-flex-row align-items-center ">
                    <!-- Sport picker -->
                    <div class="col-sm-1 col-md-2 col-lg-2 col-xl-1 my-1">
                        <select class="custom-select mr-sm-2 form-control " name="sport">
                            <option selected disabled hidden>Deporte</option>
                            @foreach ($sportTypes as $sportType)
                                <option @if ($sportType->id == $sport) selected @endif value="{{ $sportType->id }}"> {{ $sportType->nombre }} </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Place picker -->
                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1 my-1">
                        <input type="text" class="form-control" placeholder="Barcelona" value="{{ $city }}" name="city">
                    </div>

                    <!-- Date picker -->
                    <div class="col-auto my-1">
                        <input class="form-control" id="datepicker" width="100" placeholder="Hoy" name="date" readonly />
                        <script>
                            $('#datepicker').datepicker({
                                language: 'en',
                                minDate: new Date(),
                                dateFormat: "dd/mm/yyyy",
                                todayButton: new Date(),
                                clearButton: true
                            });
                        </script>
                    </div>

                    <!-- Enclosure picker -->
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2 " name="enclosure">
                            <option selected disabled hidden>Cerramiento</option>
                            @foreach ($enclosureTypes as $enclosureType)
                                <option @if ($enclosureType->cerramiento == $enclosure) selected @endif value="{{ $enclosureType->cerramiento }}"> {{ $enclosureType->cerramiento }} </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Surface picker -->
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2 " name="surface">
                            <option selected disabled hidden>Superficie</option>
                            @foreach ($surfaceTypes as $surfaceType)
                                <option @if ($surfaceType->superficie == $surface) selected @endif value="{{ $surfaceType->superficie }}"> {{ $surfaceType->superficie }} </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Wall picker -->
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2 " name="wall">
                            <option selected disabled hidden>Pared</option>
                            @foreach ($wallTypes as $wallType)
                                <option @if ($wallType->pared == $wall) selected @endif value="{{ $wallType->pared }}"> {{ $wallType->pared }} </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Send info -->
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary"> Buscar </button>
                    </div>
                    
                </div>
            </form>
        </div>



    </div>


    <!-- BottomContent / Sports centers searched -->
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light ">
        <div class="album py-5 bg-light">
            <h3 class="display-5 container-fluid"> Clubs encontrados </h3>
            <br/>
            <div class="container">
                <div class="row">

                    @foreach($sportsCentersSearched as $center)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="img/<?php echo $center->imagen_perfil ?>" alt="image club" height="200" width="150">
                                <div class="card-body">
                                    <h5 class="card-text"> <?php echo $center->nombre ?> </h5>
                                    <small class="text-muted"> <?php echo $center->direccion ?> </small>
                                    <hr/>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('club',$center->id) }}"> <button type="button" class="btn btn-sm btn-outline-secondary"> Ver </button> </a>
                                            <a href="{{ route('reservar',$center->id) }}"> <button type="button" class="btn btn-sm btn-outline-secondary ml-2 "> Reservar </button> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    

                    

                </div>
            </div>
        </div>
    </div>






@endsection