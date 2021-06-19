<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CursoController;

class RegistromatriculaController extends Controller
{
    //
    public function index(){

        //$datosD['doc'] = DB::select('select * from docente');
        //$reg['reg'] = DB::select('select * from curso');

        //dd($datosD);
       return view('registro.index');

    }
}
