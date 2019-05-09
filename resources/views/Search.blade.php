@extends('Template')

@section('Main')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
        <h1> Tu búsqueda: </h1>
        <h5><?php    print_r($city . " "); ?> </h5>
        <h5><?php    print_r($sport . " "); ?> </h5>
        <h5><?php    print_r($date . " "); ?> </h5>
        <h5><?php    print_r($enclosure . " "); ?> </h5>
        <h5><?php    print_r($surface . " "); ?> </h5>
        <h5><?php    print_r($wall . " "); ?> </h5>
    </div>

    <!-- Top content / Advanced search -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-left bg-light classe-header">
        <div class="col-md-12 p-lg-1 mx-auto my-1 align-items-center ">
        
            <h3 class="lead font-weight-normal"> Ajusta tu búsqueda: </h3>
            <form method="get" action="{{URL::to('/search')}}">
                {{ csrf_field() }}
                <div class="form-row d-flex flex-row">    
                    <!-- Sport picker -->
                    <div class="col-auto my-1">
                        <select class="custom-select mr-sm-2 " name="sport">
                            <option value="1" selected> Tenis </option>
                            <option value="2"> Basquet </option>
                            <option value="3"> Padel </option>
                            <option value="4"> Futbol 11 </option>
                            <option value="5"> Futbol 7 </option>
                        </select>
                    </div>

                    <!-- Place picker -->
                    <div class="col-auto my-1">
                        <input type="text" class="form-control" placeholder="<?php echo $city ?>" value="<?php echo $city ?>" name="city">
                    </div>

                    <!-- Date picker -->
                    <div class="col-auto my-1">
                        <input id="datepicker" width="150" placeholder="<?php echo $date ?>" name="date" /> 
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap',
                                format: 'dd/mm/yyyy'
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
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
        <div class="album py-5 bg-light">
            <h2 class="display-5 container-fluid"> Clubs disponibles </h2>
            <br/>
            <div class="container">
                <div class="row">
                    
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="img/<?php //echo $center->imagen_perfil ?>" alt="image club" height="200" width="150">
                                <div class="card-body">
                                    <h5 class="card-text"> <?php //echo $center->nombre ?></h5>
                                    <small class="text-muted"> <?php //echo $center->direccion ?> </small>
                                    <hr/>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    

                    

                </div>
            </div>
        </div>
    </div>






@endsection