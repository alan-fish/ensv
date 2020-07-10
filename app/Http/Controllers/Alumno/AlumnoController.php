<?php

namespace App\Http\Controllers\Alumno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Alumnopassword;

use Auth;
use Hash;

use App\Alumno;

class AlumnoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:alumno');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function menu()
    {
        return view('/alumno/menualumno');   
    }

    public function perfil()
    {
     return view('/alumno/perfil-alumno');
    }

            
    public function password()
    {
        return View('/alumno/update_password');
    }
                
    public function updatePassword(Alumnopassword $request)
    {
        if (Hash::check($request->mypassword, Auth::user()->password)){
            $Alumno = new Alumno;
            $Alumno->where('email', '=', Auth::user()->email)
                 ->update(['password' => bcrypt($request->password),'changedpassword' => 1]);
           
                 return View('/alumno/menualumno');
        }
        else
        {
            return redirect()->back()
             ->withInput()
             ->withErrors([
            'mypassword' => 'Contraseña incorrecta',
        ]);
        }
    }
}

