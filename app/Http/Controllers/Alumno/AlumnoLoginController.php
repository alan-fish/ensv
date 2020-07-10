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
            'login' => 'required',
            'password'  => 'required|min:8'
        ],$messages);;

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
        ? 'email' 
        : 'matricula';

         $request->merge([
            $login_type => $request->input('login')
         ]);

        //Attempt to log the user in // aqui verifica esos datos
        if(Auth::guard('alumno')->attempt($request->only($login_type, 'password'))){

            //If successfull, then redirect to their intended location

            return redirect()->intended(route('alumno.menu'));
        }
        //if unsuccessfull, then redirect back to the login with the form data

        return redirect()->back()
        ->withInput()
        ->withErrors([
            'login' => 'Matrícula o correo electrónico incorrectos',
            'password' => 'Contraseña incorrecta',
        ]);// esto regresa el correo en su label

    }

    public function alumnoLogout()
    {
        Auth::guard('alumno')->logout();
        return redirect('/alumno/login');
    }


}