@extends('layouts.main')

@section('content')


<div class="container"  id="container-login">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
        <div class="card">
        <div id="card_header_registro" class="card-header">
                <h3 style="font-weight: bold">Recuperación de contraseña</h3>
            </div>          
            <div class="card-body">
                        @if(session('infoNoEncontrada'))  
                            <div  class="alert alert-danger alert-dismissible fade show">
                                {{session('infoNoEncontrada')}}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        @include ('layouts.error')
                        <h4>Ingrese los datos para validar su información</h4>
                        <br>
                        <form method="post" action="{{ route('alumno.restablecer.submit') }}">
                        {{ csrf_field() }}

                                <div id="div_registro" class="form-group row">
                                    <label for="email" class="col-form-label col-sm-4">Correo electrónico:</label>
                                    <div class="col-sm-8">
                                        <input id="registro-input" class="form-control" type="email" name="email" placeholder="Ejemplo: usuario@servidor.com">
                                    </div>
                                </div>

                                <div id="div_registro" class="form-group row">
                                    <label for="curp" class="col-form-label col-sm-4">Curp:</label>
                                    <div class="col-sm-8">
                                        <input id="registro-input" class="form-control" type="text" name="curp">
                                    </div>
                                </div>

                        <div id="div_registro" class="form-group row">
                            <button id="button_registro" class="btn btn-outline-primary btn-block" type="submit">
                            <i class="fas fa-envelope"></i> Enviar
                            </button>   
                        </div>
                        
                        </form>
            </div>
      </div>
    </div>
  </div>
</div>


@endsection