<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CursoController;

class RegistromatriculaController extends Controller
{
    //
    public function index(){

        $id_c = session('id_curso_registro');
        $id_e = session('id');


        DB::insert("INSERT INTO registromatricula (Id_curso,Id_estudiante) VALUES ('$id_c','$id_e')");

       return view('registro.index');

    }
    public function edit($Id){


        session(['id_curso_registro' => $Id]);

        return view('registro.edit');
    }

    public function update($Id){

        $id_c = $Id;
        $id_e = session('id');


        DB::insert("INSERT INTO registromatricula (Id_curso,Id_estudiante) VALUES ('$id_c','$id_e')");


        return view('registro.edit');
    }

    public function store(Request $request){

        $id_c = session('id_curso_registro');
        $id_e = session('id');


        DB::insert("INSERT INTO registromatricula (Id_curso,Id_estudiante) VALUES ('$id_c','$id_e')");



        //return $data;
        //docente::insert($data);
        //return view("/docente/create");
        //response()->json($data);
        //$resul = "Registrado Exitosamente";
        return view('registro.index');
    }
}
