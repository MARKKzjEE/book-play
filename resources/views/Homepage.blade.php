@extends('Template')
@section('Main')
<!-- Header -->
<header class="masthead d-flex" style="background-image: url('http://football.sportsandgo.com/wp-content/uploads/2018/08/paddle.jpg');">
    <div class="container text-center my-auto text-light">
      <h1 class="mb-1"> BOOK&PLAY  </h1>
      <h3 class="mb-5">
        <em>¡Reserva tu pista de forma fácil y rápida! </em>
      </h3>
      <a class="btn btn-light btn-xl js-scroll-trigger" href="#search"> ¡Empieza ya! </a>
    </div>
    <div class="overlay"></div>
</header>

<!-- Search fform -->
<section class="content-section bg-light" id="search">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2> ¡Busca tu sitio ideal para practica deporte! </h2>
          <p class="lead mb-5"> Hay disponibles decenas de establecimientos </p>

                <form method="get" action="{{URL::to('/search')}}">
                    {{ csrf_field() }}
                    <div class="form-row align-items-center">
                        <!-- Sport picker -->
                        <div class="col-sm-3 col-md-5 col-lg-3 my-1">
                            <select class="custom-select mr-sm-2 form-control " name="sport">
                                @foreach ($sportTypes as $sportType)
                                    <option value="{{ $sportType->id }}"> {{ $sportType->nombre }} </option>
                                @endforeach
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
</section>


  <!-- Callout -->
  <section class="callout" style="background-image: url('http://new.lasasport.es/wp-content/uploads/2016/12/padel04.jpg');">
    <div class="container text-center text-light">
      <h2 class="mx-auto mb-5"> <em>Compite</em> contra los mejores</h2>
      <a class="btn btn-dark btn-xl" href="{{ route('tournaments') }}">Inscribite ya!</a>
    </div>
  </section>

  <!-- Clubs -->
  <section class="content-section" id="portfolio">
    <div class="container">

      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Los mejores clubes segun nuestros usuarios </h3>
        <h2 class="mb-5"> Clubs destacados </h2>
      </div>

      <div class="row no-gutters">
            @foreach($sportsCentersVIP as $center)
                <div class="col-lg-6">
                    <a class="portfolio-item" href="{{ route('club',$center->id) }}">
                        <span class="caption">
                            <span class="caption-content">
                            <h2> <?php echo $center->nombre ?> </h2>
                            <p class="mb-0"> <?php echo $center->direccion ?> </p>
                            </span>
                        </span>
                        <img class="img-fluid" src="img/<?php echo $center->imagen_perfil ?>" alt="" style="width:570px!important; height:390px!important;" >
                    </a>
                </div>
            @endforeach
      </div>
    </div>
  </section>    
  <!-- Map -->
  <section id="contact" class="map">
    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%&height=600&hl=es&q=Les%20Rambles%2C%201%20Barcelona%2C%20Spain+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=14&iwloc=B&output=embed"></iframe>
    <br />
    <small>
      <a href="https://maps.google.com/maps?width=100%&height=600&hl=es&q=Les%20Rambles%2C%201%20Barcelona%2C%20Spain+(Mi%20nombre%20de%20egocios)&ie=UTF8&t=&z=14&iwloc=B&output=embed"></a>
    </small>
    
  </section>
@endsection