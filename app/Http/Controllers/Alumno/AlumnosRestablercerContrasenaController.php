<?php

namespace App\Http\Controllers\Alumno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\RestablecerContraseña;
use App\Http\Requests\updatePassword;

use App\Alumno;
use Mail;
use DB;
use Auth;
use Hash;

class AlumnosRestablercerContrasenaController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:alumno');
    }
    //Esta es la vista para obtener el email
    public function getEmail()
    { 
        return view('alumno.resetPassword');
    }

    public function postEmail(RestablecerContraseña $request)
    {
        $data = request()->all();
        $data['confirmation_code']= str_random(25);

        Alumno::where('email', '=', $data['email'])
                ->where('curp', '=', $data['curp'])
                ->update(['confirmation_code' => $data['confirmation_code'],  
                 ]);

        Mail::send('emails.restablecerContrasena',$data ,function($message) use ($data){
        $message->to($data['email'])->subject('Recuperación de contraseña');
    });
        return redirect()->route('alumno.login')->with('info', 'Enlace de restablecimiento de contraseña enviado');
    }

    public function verify($code)
    {
        $alumno = Alumno::where('confirmation_code', $code)->first();

        if(! $alumno)
        {
            return redirect()->route('inicio');
        }
        return view('/alumno/nuevaContrasena')->with('alumno',$alumno);
    }

    public function updatePassword(updatePassword $request)
    { 
        $data = request()->all();    
        $alumno = new Alumno;
        $alumno->where('email', '=', $data['email'] )
             ->update(['password' => bcrypt($request->password),
             'confirmation_code' => 'restablecida']);

        if(! $alumno)
        {
            return redirect()->route('inicio');
        }
        
        return redirect()->route('alumno.login')->with('info', 'Contraseña actualizada correctamente');
    }
}
