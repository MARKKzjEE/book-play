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
        
        
        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        
        <link href="{{ URL::asset('css/datepicker.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ URL::asset('js/datepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/i18n/datepicker.en.js') }}" type="text/javascript"></script>





        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('css/stylish-portfolio.min.css') }}" rel="stylesheet">

        <style>

            .masthead2{
                height:20vh;
                min-height:50px;
                background-size:cover;
                background-position:center;
                background-repeat:no-repeat;

            }
            :root {
                --input-padding-x: 1.5rem;
                --input-padding-y: 0.75rem;
            }

            .login,.image {
                min-height: 100vh;
            }

            .bg-image {
                background-image: url('https://wallpaperaccess.com/full/656665.jpg');
                background-size: cover;
                background-position: center;
            }

            .login-heading {
                font-weight: 300;
            }

            .btn-login {
                font-size: 0.9rem;
                letter-spacing: 0.05rem;
                padding: 0.75rem 1rem;
                border-radius: 2rem;
            }

            .form-label-group {
                position: relative;
                margin-bottom: 1rem;
            }

            .form-label-group>input, .form-label-group>label {
                padding: var(--input-padding-y) var(--input-padding-x);
                height: auto;
                border-radius: 2rem;
            }

            .form-label-group>label {
                position: absolute;
                top: 0;
                left: 0;
                display: block;
                width: 100%;
                margin-bottom: 0;
                /* Override default `<label>` margin */
                line-height: 1.5;
                color: #495057;
                cursor: text;
                /* Match the input under the label */
                border: 1px solid transparent;
                border-radius: .25rem;
                transition: all .1s ease-in-out;
            }

            .form-label-group input::-webkit-input-placeholder {
                color: transparent;
            }

            .form-label-group input:-ms-input-placeholder {
                color: transparent;
            }

            .form-label-group input::-ms-input-placeholder {
                color: transparent;
            }

            .form-label-group input::-moz-placeholder {
                color: transparent;
            }

            .form-label-group input::placeholder {
                color: transparent;
            }

            .form-label-group input:not(:placeholder-shown) {
                padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
                padding-bottom: calc(var(--input-padding-y) / 3);
            }

            .form-label-group input:not(:placeholder-shown)~label {
                padding-top: calc(var(--input-padding-y) / 3);
                padding-bottom: calc(var(--input-padding-y) / 3);
                font-size: 12px;
                color: #777;
            }


            /*Table responsive horitzontal scroll */
            .dtHorizontalExampleWrapper {
            max-width: 600px;
            margin: 0 auto;
            }
            #dtHorizontalExample th, td {
            white-space: nowrap;
            }

            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
            }

        </style>

  </head>

  <body id="page-top" >
        <!-- Navigation -->
        <a class="menu-toggle rounded" href="#"> <i class="fas fa-bars"> </i> </a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand ">
                    <a class="js-scroll-trigger" href="{{ route('home') }}"> Book&Play</a>
                </li>

                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" href="{{ route('home') }}"> Inicio </a>
                </li>

                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" href="{{ route('tournaments') }}"> Torneos</a>
                </li>

                @if (Route::has('login'))
                        @auth
                            <li class="sidebar-nav-item">
                                <a class="js-scroll-trigger" href="{{ route('getprofileinfo') }}/{{ \Auth::user()->id }}/false">Mi perfil</a>
                            </li>

                            <li class="sidebar-nav-item">
                                <a class="js-scroll-trigger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            
                            @else
                            <li class="sidebar-nav-item">
                                <a class="js-scroll-trigger" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>

                            @if (Route::has('register'))
                            <li class="sidebar-nav-item">
                                <a class="js-scroll-trigger" href="{{ route('register') }}">Registrar</a>
                            </li>
                            @endif
                        @endauth
                @endif
                
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" href="{{ route('registrationClub') }}">!Inscribe tu club!</a>
                </li>

                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" href="{{ route('eliminar') }}"> AdminTools </a>
                </li>
            </ul>
        </nav>


        <!-- MAIN -->
        <main role="main" >
            @yield('Main')
        </main>

         <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
            <ul class="list-inline mb-5">
                <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="https://github.com/MARKKzjEE/book-play">
                    <i class="fab fa-github"></i>
                </a>
                </li>
                <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/">
                    <i class="fab fa-instagram"></i>
                </a>
                </li>
                <li class="list-inline-item">
                <a class="social-link rounded-circle text-white" href="https://twitter.com/?lang=es">
                    <i class="fab fa-twitter"></i>
                </a>
                </li>
            </ul>
            <p class="text-muted small mb-0">Copyright &copy; Proyecto de LIS 2019</p>
            </div>
        </footer>



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
        <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
        <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{ asset('js/bootstrap2.min.js') }}" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Plugin JavaScript -->
        <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{ URL::asset('js/stylish-portfolio.min.js') }}"></script>

        
        
        
        <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });

        function opentimetable($fecha, $hora, $idpista, $iduser){
            $("#detailtimetable").load("{{ route('detailtimetable') }}/" + $fecha + "/" + $hora + "/" + $idpista+ "/" + $iduser);
            $('#bigwindow').fadeIn("slow");
        }
        function filters($superficie,$cercamiento,  $pared, $deporte, $fecha, $id, $user){
            console.log($superficie,$cercamiento,  $pared, $deporte, $fecha, $id, $user);
            $("#containertimetable").load("{{ route('filters') }}/" + $superficie + "/" + $cercamiento+ "/"+ $pared + "/" + $deporte + "/"+ $fecha + "/" + $id+ "/" + $user);
        }
        function quitX(){
            $('#bigwindow').fadeOut("medium");
        }

        function timetableload($idclub, $iduser){
            let d = new Date();
            let dnow = new Date(d.getTime() + d.getTimezoneOffset()*-60000);
            let now = dnow.toISOString();
            var $today = now.split("T")[0];
            console.log($today);

            $('#containertimetable').load("{{ route('timetablepart') }}/" + $idclub + "/" + $iduser + "/" + $today);
        }
        </script>
  </body>
</html>
