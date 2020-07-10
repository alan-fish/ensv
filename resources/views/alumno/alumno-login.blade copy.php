@extends('layouts.main')

@section('content')

<div class="container"  id="container-login">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2><b>INICIO DE S
                        ESIÓN ALUMNO</b></h2>
                </div>
                <div class="card-body">

                    <form class="login-form text-center" method="POST" action="{{ route('alumno.login.submit') }}" >
                        @csrf
                    
                        <!--Por correo-->
                        <div class="form-group">                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                 name="email" value="{{ old('email') }}" required autocomplete="email" 
                                 autofocus placeholder="Correo Electronico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                         
                        </div>

                        <!--Password-->
                        <div class="form-group">                     
                                <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" name="password" 
                                required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="">                          
                            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">
                                Ingresar
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
