$(document).ready(function(){
    let d = new Date();
    let dnow = new Date(d.getTime() + d.getTimezoneOffset()*-60000);
    let now = dnow.toISOString();
    var today = now.split("T")[0];
    $("#date_today").val(today);

    $('select[name="superficie"]').change(function(){
        var cercamiento = $('#cercamiento option:selected').val();
        var superficie = $('#superficie option:selected').val();
        var pared = $('#pared option:selected').val();
        var deporte = $('#deporte option:selected').val();
        var date = $('#date_today').val();
        var user = $('#getuser').val();
        var club = $('#getclub').val();
        document.getElementById("buttonsearch").addEventListener('click', filters(superficie,cercamiento,pared,deporte,date,club,user));

    });
    $('select[name="cercamiento"]').change(function(){
        var cercamiento = $('#cercamiento option:selected').val();
        var superficie = $('#superficie option:selected').val();
        var pared = $('#pared option:selected').val();
        var deporte = $('#deporte option:selected').val();
        var date = $('#date_today').val();
        var user = $('#getuser').val();
        var club = $('#getclub').val();
        document.getElementById("buttonsearch").addEventListener('click', filters(superficie,cercamiento,pared,deporte,date,club,user));

    });
    $('select[name="pared"]').change(function(){
        var cercamiento = $('#cercamiento option:selected').val();
        var superficie = $('#superficie option:selected').val();
        var pared = $('#pared option:selected').val();
        var deporte = $('#deporte option:selected').val();
        var date = $('#date_today').val();
        var user = $('#getuser').val();
        var club = $('#getclub').val();
        document.getElementById("buttonsearch").addEventListener('click', filters(superficie,cercamiento,pared,deporte,date,club,user));

    });
    $('select[name="deporte"]').change(function(){
        var cercamiento = $('#cercamiento option:selected').val();
        var superficie = $('#superficie option:selected').val();
        var pared = $('#pared option:selected').val();
        var deporte = $('#deporte option:selected').val();
        var date = $('#date_today').val();
        var user = $('#getuser').val();
        var club = $('#getclub').val();
        document.getElementById("buttonsearch").addEventListener('click', filters(superficie,cercamiento,pared,deporte,date,club,user));

    });
    $('#date_today').change(function(){
        console.log("Valor:"+$(this).val()+".");
        if($("#date_today").val() == ""){
            console.log("error");
            $("#date_today").val(now.split("T")[0]);
        }

        /*
        DESCOMENTAR SI NO QUEREMOS PONER FECHAS ANTERIORES AL DIA ACTUAL.
        */
        if($("#date_today").val() < today){
            $("#date_today").val(today);
        }
        
        var cercamiento = $('#cercamiento option:selected').val();
        var superficie = $('#superficie option:selected').val();
        var pared = $('#pared option:selected').val();
        var deporte = $('#deporte option:selected').val();
        var date = $('#date_today').val();
        var user = $('#getuser').val();
        var club = $('#getclub').val();
        document.getElementById("buttonsearch").addEventListener('click', filters(superficie,cercamiento,pared,deporte,date,club,user));
    });

    $('#resetfilters').click(function(){
        console.log("reset");
        $('#cercamiento').val('-1');
        $('#superficie').val('-1');
        $('#pared').val('-1');
        $('#deporte').val('-1');
        let d = new Date();
        let dnow = new Date(d.getTime() + d.getTimezoneOffset()*-60000);
        let now = dnow.toISOString();
        var today = now.split("T")[0];
        $('#date_today').val(today);

        var cercamiento = $('#cercamiento option:selected').val();
        var superficie = $('#superficie option:selected').val();
        var pared = $('#pared option:selected').val();
        var deporte = $('#deporte option:selected').val();
        var date = $('#date_today').val();
        var user = $('#getuser').val();
        var club = $('#getclub').val();
        document.getElementById("buttonsearch").addEventListener('click', filters(superficie,cercamiento,pared,deporte,date,club,user));

    });
});

