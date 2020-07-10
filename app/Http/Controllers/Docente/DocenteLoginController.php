<?php

namespace App\Http\Controllers\Docente;

use App\Docente;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DocenteLoginController extends Controller
{

    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest:docente')->except('docenteLogout');
    }

    public function showLoginForm(){  //This function bring the form what the admin need to use for sign in/Esto trae el formulario de logeo
        return view('docente.docente-login');
    }

    public function login(Request $request){
        $messages = [
            "password.min" => "La contraseña es de minimo 8 caracteres"
        ];

        $this->validate($request, [
            'email' => 'required|email',
            'password'  => 'required|min:8'
        ],$messages);;

        //Attempt to log the user in // aqui verifica esos datos
        if(Auth::guard('docente')->attempt(['email' => $request->email, 'password' => $request->password])){

            //If successfull, then redirect to their intended location

            return redirect()->route('docente.menu');
        }
        //if unsuccessfull, then redirect back to the login with the form data

        return redirect()->back()
        ->withInput($request->only('email'))->withErrors([
            'password' => 'Contraseña incorrecta o correo electrónico.',
           // 'email' => 'Email no encontrado'
        ]);;// esto regresa el correo en su label

    }

    public function docenteLogout()
    {
        Auth::guard('docente')->logout();
        return redirect('/docente/login');
    }


}