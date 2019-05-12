<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
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
            <a class="navbar-brand" href="#"> Book&Play</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> !Inscribe tu club! </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Iniciar sesión </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Registrar </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/perfil')}}"> Mi perfil </a>
                    </li>
                </ul>
               
            </div>
        </nav>

        <!-- MAIN -->
        <main role="main">
            <!-- Header -->
            <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light classe-header">
                <p class="lead font-weight-normal">! Reserva tu pista de forma fácil y rapida! </p>
                <div class="col-md-6 p-lg-5 mx-auto my-5 align-items-center ">
                    <form >
                        <div class="form-row align-items-center">
                            <!-- Sport picker -->
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormCustomSelect"> Preferencia </label>
                                <select class="custom-select mr-sm-2 " id="inlineFormCustomSelect">
                                    <option selected> Tenis </option>
                                    <option value="1"> Basquet </option>
                                    <option value="2"> Padel </option>
                                    <option value="3"> Futbol 11 </option>
                                    <option value="4"> Futbol 7 </option>
                                </select>
                            </div>

                            <!-- Place picker -->
                            <div class="col-sm-4 my-1">
                                <label class="sr-only" for="inlineFormInput"> City </label>
                                <input type="text" class="form-control" id="inlineFormInput" placeholder="Barcelona" value="Barcelona">
                            </div>

                            <!-- Date picker -->
                            <input id="datepicker" width="170" placeholder="Fecha" />
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap'
                                });
                            </script>

                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary"> Buscar </button>
                            </div>
                            
                        </div>
                    </form>
                    
                </div>
            </div>

            

            <div class="album py-5 bg-light">
                <h2 class="display-5 container-fluid"> Clubs destacados </h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Aquí va una pequeña descripción del club o iconos con los servicios que ofrece el club </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button>
                                        </div>
                                        <small class="text-muted"> 5€/h </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Aquí va una pequeña descripción del club o iconos con los servicios que ofrece el club </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button>
                                        </div>
                                        <small class="text-muted"> 5€/h </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Aquí va una pequeña descripción del club o iconos con los servicios que ofrece el club </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button>
                                        </div>
                                        <small class="text-muted"> 5€/h </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Aquí va una pequeña descripción del club o iconos con los servicios que ofrece el club </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button>
                                        </div>
                                        <small class="text-muted"> 5€/h </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Aquí va una pequeña descripción del club o iconos con los servicios que ofrece el club </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button>
                                        </div>
                                        <small class="text-muted"> 5€/h </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="http://www.clubfitness.us/wp-content/gallery/Brentwood/gyms-near-me-trainer-stl-brentwood.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Aquí va una pequeña descripción del club o iconos con los servicios que ofrece el club </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Reservar </button>
                                        </div>
                                        <small class="text-muted"> 5€/h </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <!-- Footer -->
        <footer class="container py-5">
            <div class="row">
                <!-- logo copyright -->
                <div class="col-12 col-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
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
