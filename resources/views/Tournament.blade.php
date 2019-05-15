@extends('Template')
@section('Main')

    <!-- Header -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
        <h2 class="display-5 container-fluid"> Torneos </h2>
        <p class="lead font-weight-normal">¡Apúntate y compite contra otros jugadores! </p>
        <div class="col-md-9 p-lg-5 mx-auto my-5 align-items-center ">

            <form class="form1" action="{{URL::to('/form')}}" method="get">
                {{ csrf_field() }}
                <div class="form-row align-items-center">
                    <!-- Place picker -->
                    <div class="col-sm-4 col-md-5 col-lg-3 my-1">
                        <label class="sr-only" for="inlineFormInput"> Establecimiento </label>
                        <input type="text" class="form-control" id="inlineFormInput" placeholder="Establecimiento o ciudad " value="" name="name">
                    </div>
                    <!-- Sport picker -->
                    <div class="col-sm-3 col-md-5 col-lg-2 my-1">
                        <label class="sr-only" for="inlineFormCustomSelect"> Deporte </label>
                        <select class="custom-select mr-sm-2 " id="inlineFormCustomSelect" name="sport">
                            <option selected> Tenis </option>
                            <option value="1"> Basquet </option>
                            <option value="2"> Padel </option>
                            <option value="3"> Futbol 11 </option>
                            <option value="4"> Futbol 7 </option>
                        </select>
                    </div>
                    <!-- Gender picker -->
                    <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                        <label class="sr-only" for="inlineFormCustomSelect"> Género </label>
                        <select class="custom-select mr-sm-2 " id="inlineFormCustomSelect" name="gender">
                            <option value="1"> Masculino </option>
                            <option value="2"> Femenino </option>
                            <option value="3"> Mixto </option>
                        </select>
                    </div>
                    <!-- Date picker -->
                    <div class="col-auto my-1">
                        <input id="datepicker" width="150" placeholder="Hoy" name="fecha" />
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



    <div class="album py-5 bg-light">
        <h2 class="display-5 container-fluid"> Torneos destacados </h2>
        <div class="container">
            <div class="row">
                @foreach($tournaments as $i)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-text"><?php  echo $i->name?>
                                    <br>
                                    <small class="card-text"><?php echo $i->establecimiento->nombre?></small>
                                </h5>
                                <br>
                                <i class='fa fa-map-marker'></i>
                                <small class="text"><?php echo "Barcelona" ?> </small>
                                <br>
                                <i class='fas fa-table-tennis'></i>
                                <small class="text"><?php echo $i->deporte ?> </small>
                                <br>
                                <i class='fa fa-intersex'></i>
                                <small class="text"><?php echo $i->genero ?> </small>
                                <br>
                                <i class='far fa-calendar-alt'></i>
                                <small class="text"><?php $date = strtotime($i->fecha);echo date('d/m/Y',$date) ?> </small>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Inscribirse </button>
                                    </div>
                                    <small class="text-muted"> <?php echo $i->precio ?>€ por persona</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection