<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistromatriculaController extends Controller
{
    //
    public function index($id){

        //$datosD['doc'] = DB::select('select * from docente');
        $reg['reg'] = DB::select('select * from curso');

        //dd($datosD);
       return view('curso.index',$reg);

    }
}
