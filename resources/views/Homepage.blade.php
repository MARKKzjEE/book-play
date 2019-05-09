@extends('Template')

@section('Main')
    <!-- TopContent / Search sports centers  -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
        <h3 class="lead font-weight-normal">!Reserva tu pista de forma fácil y rápida!</h3>
        <div class="col-md-6 p-lg-5 mx-auto my-5 align-items-center ">
            <form method="get" action="{{URL::to('/search')}}">
                {{ csrf_field() }}
                <div class="form-row align-items-center ">
                
                    <!-- Sport picker -->
                    <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                        <select class="custom-select mr-sm-2 " name="sport">
                            <option value="1"selected> Tenis </option>
                            <option value="2"> Basquet </option>
                            <option value="3"> Padel </option>
                            <option value="4"> Futbol 11 </option>
                            <option value="5"> Futbol 7 </option>
                        </select>
                    </div>

                    <!-- Place picker -->
                    <div class="col-sm-4 col-md-6 col-lg-4 my-1">
                        <input type="text" class="form-control" placeholder="Barcelona" value="Barcelona" name="city">
                    </div>

                    <!-- Date picker -->
                    <div class="col-auto my-1">
                        <input id="datepicker" width="150" placeholder="Hoy" name="date" /> 
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap',
                                format: 'dd/mm/yyyy'
                            });
                        </script>
                    </div>
                    
                    <!-- Send info -->
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary"> Buscar </button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

    <!-- BottomContent / VIP Sports centers -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
        <div class="album py-5 bg-light">
            <h2 class="display-5 container-fluid"> Clubs destacados </h2>
            <br/>
            <div class="container">
                <div class="row">
                    @foreach($sportsCenters as $center)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="img/<?php echo $center->imagen_perfil ?>" alt="image club" height="200" width="150">
                                <div class="card-body">
                                    <h5 class="card-text"> <?php echo $center->nombre ?></h5>
                                    <small class="text-muted"> <?php echo $center->direccion ?> </small>
                                    <hr/>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('club',$center->id) }}"> <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button> </a>
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