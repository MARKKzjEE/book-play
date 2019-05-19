@extends('Template')
@section('Main')
<body onload="timetableload('<?php echo $idclub?>','<?php echo $iduser ?>')">


    <h1 class="display-5 container-fluid" style="text-align: center;">HORARIOS<hr/></h1>
    <BR>
    <div class="col-auto my-1" >
        <form action="{{ route('insertarReserva') }}">
            <select id="superficie" class="form-control hori" name="superficie">
                <option value="-1" disabled selected hidden>Superficie</option>
                @foreach($fieldTypes as $type)
                    <option value="{{ $type->superficie }}"> {{ $type->superficie }} </option>
                @endforeach

            </select>

            <select id="cercamiento" class="form-control hori" name="cercamiento">
                <option value="-1" disabled selected hidden>Cercamiento</option>
                @foreach($enclosureTypes as $enclosure)
                    <option value="{{ $enclosure->cerramiento }}"> {{ $enclosure->cerramiento }} </option>
                @endforeach
            </select>

            <select id="pared" class="form-control hori" name="pared">
                <option value="-1" disabled selected hidden>Pared</option>
                @foreach($wallTypes as $wall)
                    <option value="{{ $wall->pared }}"> {{ $wall->pared }} </option>
                @endforeach
            </select>
            
            <select id="deporte" class="form-control hori" name="deporte">
                <option value="-1" disabled selected hidden>Deporte</option>
                @foreach($datosdeporte as $deporte)
                    <option value="{{$deporte->id_deporte}}">{{$deporte->nombre_deporte}}</option>
                @endforeach
            </select>

            <input type="date" name="fechareserva" class="form-control hori" id="date_today" />
            <input type="button" class="form-control hori" id="resetfilters" value="Resetear Filtros">
            <div id="buttonsearch"></div>
        </form>
        <div id="containertimetable"></div>

    </div>
    <div id="bigwindow" class="bigwindow">
        <div class="smallwindow">
            <div id="detailtimetable"></div>
        </div>
    </div>
</body>

@endsection
