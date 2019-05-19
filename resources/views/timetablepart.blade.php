
<table class="table table-striped tablestyletime" style="">
    <thead>
    <input type="text" value="{{$iduser}}" id="getuser" style="display: none;">
    <input type="text" value="{{$idclub}}" id="getclub" style="display: none;">
    <tr>
        <th scope="col">Hora</th>
        @foreach($datospista as $dadapista)
            <th scope="col">{{$dadapista->nombrepista}}</th>
        @endforeach
    </tr>
    </thead>
    <?php

    $init = ($datosestablecimiento[0]->hora_inicio);
    $final = ($datosestablecimiento[0]->hora_final);

    for($init; $init < $final; $init = date("Y-m-d H:i:s", strtotime($init . "+30 minutes"))){
    $datetime = explode(" ",$init);
    $timefromdate = substr($datetime[1],0,-3)?>
    <tr class="tabla" >
        <td class="nombre" id='<?php echo $init ?>' value="g"><?php echo $timefromdate ?></td>

        <?php
        $boolean = " ";

        foreach($datospista as $dadapista) {
            $boolean = "<input type='button' value='$dadapista->id_pista' onclick='opentimetable(`$today`,`$timefromdate`, `$dadapista->id_pista`, `$iduser`)'>";
            foreach($datosreserva as $reserva) {
                //$initreserva = date($reserva->hora_inicio);
                $datetimereserva = explode(" ",$reserva->hora_inicio);
                $timefromdatereserva = substr($datetimereserva[1],0,-3);

                //$finalreserva = date($reserva->hora_final);
                $datefinaltimereserva = explode(" ",$reserva->hora_final);
                $timefinalfromdatereserva = substr($datefinaltimereserva[1],0,-3);

                if($dadapista->id_pista == $reserva->id_pista){

                    if($timefromdate == $timefromdatereserva){
                        if($reserva->id_pista == 2){
                            //echo $reserva->hora_inicio." ".$reserva->hora_final."<br>";
                        }
                        if($timefromdatereserva < $timefinalfromdatereserva){
                            $reserva->hora_inicio = date("Y-m-d H:i:s", strtotime($reserva->hora_inicio . "+30 minutes"));
                            if($reserva->hora_inicio == $reserva->hora_final){
                                $reserva->hora_inicio = date("Y-m-d H:i:s", strtotime($reserva->hora_inicio . "-60 minutes"));
                            }
                        }else{
                            $reserva->hora_inicio = date("Y-m-d H:i:s", strtotime($reserva->hora_inicio . "-30 minutes"));
                        }
                        $boolean = " ";

                        break;
                    }
                    else{
                        $boolean = "<input type='button' value='$dadapista->id_pista' onclick='opentimetable(`$datetimereserva[0]`,`$timefromdate`, `$dadapista->id_pista`, `$iduser`)'>";
                    }
                    $tienereserva = true;
                }

            }
        ?>
        <td><?php echo $boolean ?></td><?php

        }
        ?>
    </tr>
    <?php

    }?>


</table>
</div>
