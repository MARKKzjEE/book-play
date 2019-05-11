<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="LIS">
        <meta name="author" content="Grupo7">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Book&Play</title>
        <link rel="icon" href="https://getbootstrap.com/favicon.ico">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">
        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <link href="css/datepicker.min.css" rel="stylesheet" type="text/css">
        <script src="js/datepicker.min.js" type="text/javascript"></script>
        <script src="js/i18n/datepicker.en.js" type="text/javascript"></script>

        <style>

            header {
                position: relative;
                background-color: black;
                height: 75vh;
                min-height: 25rem;
                width: 100%;
                overflow: hidden;
            }

            .masthead {
                height: 100vh;
                min-height: 500px;
                background-image: url('https://s2.best-wallpaper.net/wallpaper/3840x1200/1609/Sunny-day-summer-tennis-stadium-ground_3840x1200.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            header .container {
                position: relative;
                z-index: 2;
            }

            header .overlay {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background-color: black;
                opacity: 0.5;
                z-index: 1;
            }

        </style>

  </head>

  <body>
        
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"> Book&Play</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('tournament') }}"> Torneos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">Registrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logIn') }}">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registrationClub') }}">!Inscribe tu club!</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('myProfile') }}">Mi perfil</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- MAIN -->
        <main role="main" >
            @yield('Main')
        </main>

        
        <!-- Footer -->
        <footer class="container py-5 ">
            <div class="row">
                <!-- logo copyright -->
                <div class="col-12 col-md">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-facebook"></i>
                    <small class="d-block mb-3 text-muted">&copy; Proyecto de LIS 2019</small>
                </div>

                <div class="col-6 col-md">
                    <h5>Télefono</h5>
                </div>

                <div class="col-6 col-md">
                    <h5>Contáctanos</h5>
                </div>

                <div class="col-6 col-md">
                    <h5>Dirección</h5>
                </div>

                <div class="col-6 col-md">
                    <h5>Sobre nosotros</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">¿Quiénes somos?</a></li>
                        <li><a class="text-muted" href="#">Politica de cookies</a></li>
                        <li><a class="text-muted" href="#">Terminos legal</a></li>
                    </ul>
                </div>
            </div>
        </footer>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
        <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
        <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
        <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
        </script>
  </body>
</html>
