<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class AlumnoLoginController extends Controller
{

    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest:alumno')->except('alumnoLogout');
    }

    public function showLoginForm(){  //This function bring the form what the admin need to use for sign in/Esto trae el formulario de logeo
        return view('alumno.alumno-login');
    }

    public function login(Request $request){
        $messages = [
            "password.min" => "La contraseña es de minimo 8 caracteres"
        ];

        $this->validate($request, [
            'email' => 'required|email',
            'password'  => 'required|min:8'
        ],$messages);;

        if(Auth::guard('alumno')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended(route('alumno.menu'));
        }
        //if unsuccessfull, then redirect back to the login with the form data

        return redirect()->back()
        ->withInput($request->only('email'))->withErrors([
            'password' => 'Contraseña incorrecta o Usuario incorrecto.',
        ]);;// esto regresa el correo en su label

    }

    public function alumnoLogout()
    {
        Auth::guard('alumno')->logout();
        return redirect('/alumno/login');
    }


}