@extends('Template')
@section('Main')

    <!-- TopContent / Search sports centers  -->
    <header class="masthead" style="background-image: url('https://pbs.twimg.com/media/DfLzJ9aU8AA1sx_.jpg');">
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <h2 class="font-weight-normal">¡Apúntate y compite contra otros jugadores!</h2>
                        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center ">
            
                            <div class="col-md-12 p-lg-5 mx-auto my-5 align-items-center">
                            <form class="form1" action="{{URL::to('/tournamentsSearched')}}" method="get">
                                {{ csrf_field() }}
                                <div class="form-row align-items-center">
                                    <!-- Place picker -->
                                    <div class="col-sm-4 col-md-5 col-lg-3 my-1">
                                        <label class="sr-only" for="inlineFormInput"> Establecimiento </label>
                                        <input type="text" class="form-control" id="inlineFormInput" placeholder="Establecimiento o ciudad " value="Barcelona" name="name">
                                    </div>
                                    <!-- Sport picker -->
                                    <div class="col-sm-3 col-md-5 col-lg-2 my-1">
                                        <label class="sr-only" for="inlineFormCustomSelect"> Deporte </label>
                                        <select class="custom-select mr-sm-2 " id="inlineFormCustomSelect" name="sport">
                                            <option value="1" selected> Tenis </option>
                                            <option value="2"> Basquet </option>
                                            <option value="3"> Padel </option>
                                            <option value="4"> Futbol 11 </option>
                                            <option value="5"> Futbol 7 </option>
                                        </select>
                                    </div>
                                    <!-- Gender picker -->
                                    <div class="col-sm-2 col-md-2 col-lg-2 my-1">
                                        <label class="sr-only" for="inlineFormCustomSelect"> Género </label>
                                        <select class="custom-select mr-sm-2 " id="inlineFormCustomSelect" name="gender">
                                            <option value="1"> Masculino </option>
                                            <option value="2"> Femenino </option>
                                            <option value="3"> Mixto </option>
                                        </select>
                                    </div>
                                    <!-- Date picker -->
                                    <div class="col-auto my-1">
                                        <input class="form-control" id="datepicker" width="150" placeholder="Hoy" name="fecha" />
                                        <script>
                                            $('#datepicker').datepicker({
                                                language: 'en',
                                                minDate: new Date(),
                                                dateFormat: "dd-mm-yyyy",
                                                todayButton: new Date(),
                                                clearButton: true
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
                    
                </div>
            </div>
        </div>
    </header>
    
    

    <!-- BottomContent / VIP Sports centers -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="album py-5 ">
            <h2 class="display-5 container-fluid"> Torneos destacados </h2>
            <br/>
            <div class="container">
                <div class="row">
                    @foreach($tournaments as $i)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
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
    </div>

@endsection