@extends('Template')
@section('Main')


    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"> </div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h4 class="login-heading mb-4"> Rellena este formulario y contactaremos contigo para añadir tu club a nuestra web </h4>
                                <form method="POST" action="mailto:someone@example.com" enctype="text/plain">
                                @csrf
                                    <!-- Name input -->
                                    <div class="form-label-group">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nombre" required autofocus>
                                        <label for="name"> Nombre </label>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Mail input -->
                                    <div class="form-label-group">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Correo" required>
                                        <label for="email"> Correo </label>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Phone number input -->
                                    <div class="form-label-group">
                                        <input id="number" type="tel" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" placeholder="Teléfono" required>
                                        <label for="number"> Teléfono </label>
                                        @if ($errors->has('number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('number') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <!-- City input -->
                                    <div class="form-label-group">
                                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" placeholder="Ciudad" required>
                                        <label for="city"> Ciudad </label>
                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <!-- Club name input -->
                                    <div class="form-label-group">
                                        <input id="clubName" type="text" class="form-control{{ $errors->has('clubName') ? ' is-invalid' : '' }}" name="clubName" placeholder="Nombre del club" required>
                                        <label for="clubName"> Nombre del club </label>
                                        @if ($errors->has('clubName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('clubName') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit"> Enviar petición </button>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection