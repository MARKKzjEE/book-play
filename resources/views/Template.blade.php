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

        <style>
            .classe-header{
                /*background-image: url("https://vanguardia.com.mx/sites/default/files/basket-callejero.jpg");*/
            }

        </style>

  </head>

  <body>
        <!-- Navegation bar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="{{ route('home') }}"> Book&Play</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registrationClub') }}"> !Inscribe tu club! </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tournament') }}"> Torneos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logIn') }}"> Iniciar sesión </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registration') }}"> Registrar </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myProfile') }}"> Mi perfil </a>
                    </li>
                </ul>
               
            </div>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logIn') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logOut') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logOut') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>


        </nav>

        <!-- MAIN -->
        <main role="main">
            @yield('Main')
        </main>

        <!-- Footer -->
        <footer class="container py-5">
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
