@extends('layouts.main')

@section('content')

<br>
<div class="container"  id="container-login">
  <div class="row justify-content-md-center">
    <div class="col-md-8">
    
        <div class="card">
            <div id="card_header_registro" class="card-header">
                <h3 style="font-weight: bold">Generación de nueva contraseña</h3>
            </div>
            <div class="card-body">
            @include ('layouts.error')
                <form method="post" action="{{ route('alumno.reset.update') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="email" value="{{ $alumno->email }}"> 
                    <div id="div_registro" class="form-group row">
                        <label for="password" class="col-form-label col-sm-4"> <i class="fas fa-key"></i> <b>Nueva contraseña: </b></label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="password" name="password">
                        </div>
                    </div>
                    <div id="div_registro" class="form-group row">
                        <label for="password_confirmation" class="col-form-label col-sm-4"> <i class="fas fa-key"></i>  <b>Confirmación: </b></label>
                        <div class="col-sm-8">
                            <input id="registro-input" class="form-control" type="password" name="password_confirmation">
                        </div>
                    </div>
                    <div id="div_registro" class="form-group row">
                        <button id="button_registro" class="btn btn-outline-primary btn-block" type="submit">
                        <i class="fas fa-lock"></i> Actualizar contraseña
                        </button>    
                    </div>
                </form>    
            </div>
        </div>

    </div>
  </div>
</div>