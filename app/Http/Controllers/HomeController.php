<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function menu()
    {
        return view('/admin/menu');
    }

    public function list()
    {
        $docentes = DB::table('docentes')->paginate('10');
        return view('/admin/list')->with('docentes', $docentes);
    }
}
