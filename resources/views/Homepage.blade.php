@extends('Template')
@section('Main')
    <!-- TopContent / Search sports centers  -->
    <header class="masthead" style="background-image: url('https://s2.best-wallpaper.net/wallpaper/3840x1200/1609/Sunny-day-summer-tennis-stadium-ground_3840x1200.jpg')" >
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <h2 class="font-weight-normal">!Reserva tu pista de forma fácil y rápida!</h2>
                        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center ">
            
                            <div class="col-md-12 p-lg-5 mx-auto my-5 align-items-center">
                                <form method="get" action="{{URL::to('/search')}}">
                                    {{ csrf_field() }}
                                    <div class="form-row align-items-center">
                                    
                                        <!-- Sport picker -->
                                        <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                                            <select class="custom-select mr-sm-2 form-control " name="sport">
                                                <option value="1"selected> Tenis </option>
                                                <option value="2"> Basquet </option>
                                                <option value="3"> Padel </option>
                                                <option value="4"> Futbol 11 </option>
                                                <option value="5"> Futbol 7 </option>
                                            </select>
                                        </div>

                                        <!-- Place picker -->
                                        <div class="col-sm-4 col-md-4 col-lg-4 my-1">
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
            <h2 class="display-5 container-fluid"> Clubs destacados </h2>
            <br/>
            <div class="container">
                <div class="row">
                    
                    @foreach($sportsCentersVIP as $center)
                        
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="img/<?php echo $center->imagen_perfil ?>" alt="image club" height="200" width="150">
                                <div class="card-body">
                                    <h5 class="card-text"> <?php echo $center->nombre ?></h5>
                                    <small class="text-muted"> <?php echo $center->direccion ?> </small>
                                    <hr/>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('club',$center->id) }}"> <button type="button" class="btn btn-sm btn-outline-secondary"> Ver </button> </a>
                                            <a href="{{ route('timetable') }}<?php echo "/".$center->id . "/2" ?> "> <button type="button" class="btn btn-sm btn-outline-secondary ml-2 "> Reservar </button> </a>
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