@extends('Template')

@section('Main')
    <?php /*  print_r($city . " - "); 
    print_r($sport . " - ");
    print_r($date . " - ");
    print_r($enclosure . " - ");
    print_r($surface . " - ");
    print_r($wall);*/?> 
    
    <!-- Top content / Advanced search -->
    <div class="position-relative overflow-hidden p-3 p-md-1 m-md-2 text-left">
        <div class="col-md-12 p-lg-1 mx-auto my-1 align-items-center ">
            <h5> Ajusta tu búsqueda: </h5>
            <form method="get" action="{{URL::to('/search')}}">
                {{ csrf_field() }}
                <div class="form-row d-flex d-flex-row align-items-center ">
                
                    <!-- Sport picker -->
                    <div class="col-sm-1 col-md-1 col-lg-1 my-1">
                        <select class="custom-select mr-sm-2 form-control " name="sport">
                            <option value="1"selected> Tenis </option>
                            <option value="2"> Basquet </option>
                            <option value="3"> Padel </option>
                            <option value="4"> Futbol 11 </option>
                            <option value="5"> Futbol 7 </option>
                        </select>
                    </div>

                    <!-- Place picker -->
                    <div class="col-sm-2 col-md-2 col-lg-2 my-1">
                        <input type="text" class="form-control" placeholder="Barcelona" value="Barcelona" name="city">
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
                            <option value="1" selected> Interior </option>
                            <option value="2"> Exterior </option>
                        </select>
                    </div>

                    <!-- Surface picker -->
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2 " name="surface">
                            <option value="1" selected> Hierba </option>
                            <option value="2"> Tierra </option>
                            <option value="3"> Cemento </option>
                        </select>
                    </div>

                    <!-- Wall picker -->
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2 " name="wall">
                            <option value="1" selected> Muro </option>
                            <option value="2"> Cristal </option>
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
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light classe-header">
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