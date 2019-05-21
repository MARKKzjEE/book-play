@extends('Template')
@section('Main')
    <!-- Tournaments searched -->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
        <div class="album py-5 ">
            <h2 class="display-5 container-fluid"> Torneos encontrados </h2>
            <br/>
            <div class="container">
                <div class="row">
                    @foreach($tournsSearched as $tourny)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body bg-light text-dark">

                                    <h4 class="card-text"> {{ $tourny->name }} </h4>
                                    <small class="card-text"> {{ $tourny->nombre}} </small> <br><br>
                                    
                                    <i class='fa fa-map-marker'></i>
                                    <small class="text"> {{ $tourny->direccion }} </small>
                                    <br><br>
                                    <i class='far fa-calendar-alt'></i>
                                    <small class="text"> {{ date_format(date_create($tourny->fecha),"d/m/y") }} </small> 
                                    
                                    <i class="fas fa-trophy ml-5"></i>
                                    <small class="text"> {{ $sportName }} </small><br><br>

                                    <i class="fas fa-venus-mars"></i>
                                    <small class="text"> {{ $gender }}  </small>

                                    <i class="fas fa-money-bill-wave ml-5"></i>
                                    <small class="text"> {{ $tourny->precio }}€/pers. </small><br> <br>

                                    
                                    <p class="text-muted"> Numero de entradas: </p>

                                    <form class="formTournament" action=" {{ URL::to('/signUpTournament' , $tourny->id_tourny)  }}" method="get" >
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