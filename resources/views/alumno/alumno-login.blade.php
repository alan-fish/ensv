@extends('layouts.main')

@section('content')

<div class="container"  id="container-login">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                <h2><b>INICIO DE SESIÓN ALUMNO</b></h2>
                </div>
                <div class="card-body">

                    <form class="login-form" method="POST" action="{{ route('alumno.login.submit') }}" >
                        @csrf
                    
                        <!--Por correo o matricula-->
                        <div class="form-group">  
                                <label for="login"><b>Correo Electrónico o Matrícula</b></label>                          
                                <input id="login" type="text" class="form-control{{ $errors->has('matricula') || 
                                $errors->has('email') ? ' is-invalid' : '' }}"
                                name="login" value="{{ old('matricula') ?: old('email') }}" required autofocus 
                                placeholder="Matrícula o Correo electrónico">

                                @if ($errors->has('matricula') || $errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('matricula') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif                        
                        </div>

                        <!--Password-->
                        <div class="form-group"> 
                                <label for="password"><b>Contraseña</b></label>                    
                                <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" name="password" 
                                required autocomplete="current-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="">                          
                            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">
                                INICIAR SESIÓN
                            </button>

                             <!--    @if (Route::has('password.request'))  -->
                                    <a class="btn btn-link" href="#">
                                        ¿Haz olvidado tu contraseña?
                                    </a>
                              <!--    @endif -->
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
