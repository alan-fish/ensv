@extends('layouts.main')

@section('content')

<div class="container"  id="container-login">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2><b>BIENVENIDO ALUMNO </b></h2>
                </div>
                <div class="card-body">

                    <form class="login-form text-center" method="POST" action="{{ route('alumno.login.submit') }}" >
                        @csrf
                    
                        <!--Por correo-->
                        <div class="form-group">
                            <!--Por correo      <label for="login"><b>Correo Electrónico o Matrícula</b></label>                          
                                <input id="login" type="text" class="form-control{{ $errors->has('matricula') || 
                                $errors->has('email') ? ' is-invalid' : '' }}"
                                name="login" value="{{ old('matricula') ?: old('email') }}" required autofocus 
                                placeholder="Matrícula o Correo electrónico">

                                @if ($errors->has('matricula') || $errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('matricula') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif -->                                    
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

                        <div class="container-fluid">                          
                            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">
                                Ingresar
                            </button>   
                                     <a class="btn btn-link" href="{{ route('alumno.resetablecer') }}">
                                        ¿Haz olvidado tu contraseña?
                                    </a>
                        </div>
                    </form>
                    @if(session('info'))  
                        <div  class="alert alert-success alert-dismissible fade show">
                        {{session('info')}}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
