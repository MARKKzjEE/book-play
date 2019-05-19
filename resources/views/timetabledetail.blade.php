<div>
    <img  onclick="quitX()" id="x" src="{{ URL::asset('img/x.png') }}"/>
</div>
<div style="text-align: center; padding-top: 15%;">
    <?php

    $inittime = date($datetotal.":00");
    $finaltime = date($nextschedule->hora_inicio);

    //echo $minutos."<br>";
//    echo $inittime."<br>";
//    echo $finaltime."<br>";
    if($booky == 0){
        $aux1 = explode(" ",$inittime);
        $aux2 = explode(" ", $finaltime);
        $finaltime = $aux1[0]." ".$aux2[1];
    }

//    echo $inittime."<br>";
//    echo $finaltime."<br>";
//    echo "ID user: ".$id_user."<br>";
    $string = $hora.":00";

    //$string = date($string);
    echo "<b>Reservar Pista</b>"."<br>";
    echo "Fecha Seleccionada: ".$fecha." ".$string."<br>"."<br>"."<br>";
    echo "ID pista: ".$id_pista."<br>";
    echo "Hora Inicio:"." ".$hora."&nbsp&nbsp&nbsp&nbsp&nbsp";

    $array = array();
    $inittime = date("Y-m-d H:i:s", strtotime($inittime . "+30 minutes"));
    for($inittime; $inittime <= $finaltime; $inittime = date("Y-m-d H:i:s", strtotime($inittime . "+30 minutes"))){
        array_push($array,$inittime);
    }
    $var = strtotime($inittime . "+30 minutes")
    ?>
    <select name="" id="finalhour">
        <option value="-1" disabled selected hidden>Seleccionar hora final</option>
        @foreach ($array as $one){
        <?php $divide = explode(" ",$one);
        $both = $divide[0].$divide[1];
        $onlytime = substr($divide[1],0,-3);
        ?>
        <option value="{{$onlytime.":00"}}">{{$onlytime}}</option>
        @endforeach

    </select>
    <input type="button" onclick="insertBook('<?php echo $string?>', '<?php echo $id_user?>', '<?php echo $fecha?>', '<?php echo $id_pista?>')" value="Reservar">



</div>
<script>
    function insertBook($hourinitial, $iduser, $fecha, $idpista){
        var $hourfinal = $('#finalhour').val();
        if($hourfinal == null){
            alert("escoja un select");
        }
        console.log($hourfinal, $hourinitial, $iduser, $fecha, $idpista);
        $("#containertimetable").load("{{ route('insertbookbd') }}/" + $hourfinal + "/"+ $hourinitial + "/"+ $iduser + "/"+ $fecha + "/"+ $idpista);
        quitX();

    }
</script>