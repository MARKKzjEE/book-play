@extends('Template')

@section('Main')

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
    <h1> Tu búsqueda: </h1>
    <h5>
    <?php

    print_r($city . " ");
    print_r($sport . " ");
    print_r($date . " ");


    ?>
    </h5>

</div>


@endsection