@extends('Template')
@section('Main')

<header class="masthead2" style="background-image: url({{ asset('img/'. $center->imagen_perfil) }});" >
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white text-left">
                    <h3 class="font-weight-normal"> {{ $center->nombre }} </h3>
                    <h5 class="font-weight-normal"> {{ $center->direccion }} </h5>
                </div>

            </div>
        </div>
</header>


<body onload="timetableload('<?php echo $idclub?>','<?php echo $iduser ?>')">

    <div class="col-auto my-1 col-md-12 p-lg-5 mx-auto my-5 align-items-center" >
        <form action="{{ route('insertarReserva') }}" class="form-row align-items-center " >
            
            <select id="superficie" class="custom-select mr-sm-2  form-control col-sm-6 col-md-2" name="superficie">
                <option value="-1" disabled selected hidden>Superficie</option>
                @foreach($fieldTypes as $type)
                    <option value="{{ $type->superficie }}"> {{ $type->superficie }} </option>
                @endforeach

            </select>

            
            <select id="cercamiento" class="custom-select mr-sm-2 form-control col-sm-6 col-md-2" name="cercamiento">
                <option value="-1" disabled selected hidden>Cercamiento</option>
                @foreach($enclosureTypes as $enclosure)
                    <option value="{{ $enclosure->cerramiento }}"> {{ $enclosure->cerramiento }} </option>
                @endforeach
            </select>

            
            <select id="pared" class="custom-select mr-sm-2 form-control col-sm-6 col-md-2" name="pared">
                <option value="-1" disabled selected hidden>Pared</option>
                @foreach($wallTypes as $wall)
                    <option value="{{ $wall->pared }}"> {{ $wall->pared }} </option>
                @endforeach
            </select>
            
            
            <select id="deporte" class="custom-select mr-sm-2 form-control col-sm-6 col-md-2" name="deporte">
                <option value="-1" disabled selected hidden>Deporte</option>
                @foreach($datosdeporte as $deporte)
                    <option value="{{$deporte->id_deporte}}">{{$deporte->nombre_deporte}}</option>
                @endforeach
            </select>

            
            <input type="date" name="fechareserva" class="form-control col-sm-6 col-md-2" id="date_today" />
            <input type="button" class="form-control col-sm-6 col-md-1 btn btn-primary" id="resetfilters" value="Resetear Filtros">
            <div id="buttonsearch"></div>
        </form>


        <!-- BottomContent  -->
        <div id="containertimetable"> </div>
            
    </div>


    <div id="bigwindow" class="bigwindow">
        <div class="smallwindow">
            <div id="detailtimetable"> </div>
        </div>
    </div>
</body>

@endsection
