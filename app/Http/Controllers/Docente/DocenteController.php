<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Alumnopassword;


use Auth;
use Hash;
use App\Docente;

class DocenteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:docente');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function menu()
    {
        return view('/docente/menudocente');
    }

    public function perfil()
    {
        return view('/docente/perfil-docente');
    }

    public function password()
    {
        return View('/docente/update_password');
    }
                
    public function updatePassword(Alumnopassword $request)
    {
        if (Hash::check($request->mypassword, Auth::user()->password)){
            $Docente = new Docente;
            $Docente->where('email', '=', Auth::user()->email)
                 ->update(['password' => bcrypt($request->password),'changedpassword' => 1]);
           
                 return View('/docente/menudocente');
        }
        else
        {
            return redirect()->back()
            ->withInput()
            ->withErrors([
                 'mypassword' => 'La contraseña actual es incorrecta',
            ]);
        }
    }

}
