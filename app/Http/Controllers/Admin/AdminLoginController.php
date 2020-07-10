<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showLoginForm(){  //This function bring the form what the admin need to use for sign in/Esto trae el formulario de logeo
        return view('admin.admin-login');
    }

    public function login(Request $request){
   // estos son los datos a valiar en el login

            $messages = [
                "password.min" => "La contraseña es de minimo 8 caracteres"
            ];

            $this->validate($request, [
                'email' => 'required|email',
                'password'  => 'required|min:8'
            ],$messages);;

        //En esta linea se consulta el email y la password con la de la bd
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

            //If successfull, then redirect to their intended location

            return redirect()->intended(route('admin.menu'));
        }
        //if unsuccessfull, then redirect back to the login with the form data

        return redirect()->back()
        ->withInput($request->only('email'))->withErrors([
            'password' => 'Contraseña incorrecta o correo electrónico.',
        ]);;// esto regresa el correo en su label

    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }


}