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
                                    <small class="text"> {{ date_format(date_create($tourny->fecha),"d/m/y") }} </small> <br><br>
                                    
                                    <i class="fas fa-trophy"></i>
                                    <small class="text"> {{ $sportName }} </small>
                                    <i class="fas fa-venus-mars ml-5"></i>
                                    <small class="text"> {{ $gender }}  </small><br> <br>

                                    
                                    <div class="mt-3 d-flex justify-content-between align-items-center ">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary">Inscribirse </button>
                                        </div>
                                        <small class="text-muted"> <?php echo $tourny->precio ?>€ por persona</small>
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