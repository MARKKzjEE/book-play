@extends('Template')
@section('Main')
@if($errors->any())
<div class="p-3 mb-2 bg-success text-white text-center"> <h3>{{$errors->first()}}</h3> </div>
@endif
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
                                        <select class="custom-select mr-sm-2 form-control " name="sport">
                                            @foreach ($sportTypes as $sportType)
                                                <option value="{{ $sportType->id }}"> {{ $sportType->nombre }} </option>
                                            @endforeach
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
                    @foreach($tournaments as $tourny)
                    
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">

                                    <h5 class="card-text"> {{ $tourny->name_tourny }}
                                        <br>
                                        <small class="card-text"> {{ $tourny->name_club }} </small>
                                    </h5> <br>

                                    <i class='fa fa-map-marker'></i>
                                    <small class="text"> {{ $tourny->direccion }}  </small>
                                    <br><br>
                                    
                                    <i class="fas fa-trophy"></i>
                                    <small class="text"> {{ $tourny->name_sport }}</small>


                                    <i class="fas fa-venus-mars ml-5"></i>
                                    <small class="text"> {{ $tourny->genero }}</small><br><br>
                                    

                                    <i class='far fa-calendar-alt'></i>
                                    <small class="text"> {{ date('d/m/Y',strtotime($tourny->fecha)) }} </small>

                                    <i class="fas fa-money-bill-wave ml-5"></i>
                                    <small class="text"> {{ $tourny->precio }}€/pers. </small><br> <br>

                                    <p class="text-muted"> Numero de inscripciones: </p>

                                    <form class="formTournament" action=" {{ URL::to('/signUpTournament' , $tourny->id_tournament)  }}" method="get" >
                                            {{ csrf_field() }}

                                            <div class="form-group col">
                                                <label class="sr-only" for="numParticipantes"> Numero participantes </label>
                                                <input type="number" class="form-control" id="numParticipantes" value="1" placeholder="1" name="number" max="{{ $tourny->num_participantes_max - $tourny->num_participantes_actual }}" >
                                            </div>

                                            <div class="form-group col">
                                                <button type="submit" class="btn btn-primary"> Inscríbite ya! </button>
                                            </div>


                                    </form>


  
  


                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>

@endsection