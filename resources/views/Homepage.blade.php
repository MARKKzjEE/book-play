@extends('Template')

@section('Main')
    <!-- TopContent -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
        <p class="lead font-weight-normal">!Reserva tu pista de forma fácil y rápida!</p>
        <div class="col-md-6 p-lg-5 mx-auto my-5 align-items-center ">
            <form method="get" action="{{URL::to('/search')}}">
                {{ csrf_field() }}
                <div class="form-row align-items-center">
                
                    <!-- Sport picker -->
                    <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                        <label class="sr-only" for="inlineFormCustomSelect"> Deporte </label>
                        <select class="custom-select mr-sm-2 " id="inlineFormCustomSelect" name="sport">
                            <option selected> Tenis </option>
                            <option value="1"> Basquet </option>
                            <option value="2"> Padel </option>
                            <option value="3"> Futbol 11 </option>
                            <option value="4"> Futbol 7 </option>
                        </select>
                    </div>

                    <!-- Place picker -->
                    <div class="col-sm-4 col-md-5 col-lg-4 my-1">
                        <label class="sr-only" for="inlineFormInput"> Ciudad </label>
                        <input type="text" class="form-control" id="inlineFormInput" placeholder="Barcelona" value="Barcelona" name="city">
                    </div>

                    <!-- Date picker -->
                    <div class="col-auto my-1">
                        <input id="datepicker" width="150" placeholder="Hoy" name="date" /> 
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap'
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

    <!-- BottomContent -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
        <div class="album py-5 bg-light">
            <h2 class="display-5 container-fluid"> Clubs destacados </h2>
            <div class="container">
                <div class="row">
                    <?php 
                    
                    ?>

                    @foreach($sportsCenters as $center)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text"> <?php echo $center->Nombre ?></p>
                                    <p class="card-text"><?php echo $center->Direccion ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('club',$center->ID) }}"> <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button> </a>
                                        </div>
                                        <small class="text-muted"> <?php echo $center->Deportes ?> </small>
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