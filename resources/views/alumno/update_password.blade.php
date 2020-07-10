@extends('layouts.main')

@section('content')

<div class="container"  id="container-password">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>ACTUALIZACIÓN DE CONTRASEÑA</h3>
                </div>
                <div class="card-body">
                     @include ('layouts.error')
                    <form class="password-form" method="post" action="{{ route('alumno.passwordupdate') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                         <label for="mypassword">Introduce tu actual password:</label>
                         <input type="password" name="mypassword" class="form-control">
                        </div>
                        <div class="form-group">
                         <label for="password">Introduce tu nueva contraseña:</label>
                         <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                         <label for="password_confirmation">Confirma tu nueva contraseña:</label>
                         <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">
                            Cambiar contraseña</button>
                       </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
@endsection