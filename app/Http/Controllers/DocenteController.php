<?php

namespace App\Http\Controllers;

use App\Models\docente;
use App\Models\curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    //

    public function create(){
        return view('docente.create');
    }

    public function update(Request $request, $Id){

        $data = request()->except(['_token','_method']);

        $email = $_POST['E-mail'];
        $password = $_POST['Password'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $telefono = $_POST['Telefono'];
        $id_curso = $_POST['Curso'];
        $tipo = $_POST['Tipo'];

        DB::update("UPDATE docente
        SET Email='$email' , Pass='$password', Nombre='$nombre' , Apellido='$apellido', Telefono='$telefono' , Id_curso='$id_curso', tipoUsuario='$tipo'
        WHERE Id='$Id'
        ORDER BY(Id)");

        $consul["consul"] = DB::select("select * from docente where Id = $Id");

        //return redirect('docente');
        return view('docente.edit',$consul);
    }

    public function edit($Id){

        $consul["consul"] = DB::select("select * from docente where Id = $Id");

        return view('docente.edit',$consul);
    }

    public function destroy($Id){

        DB::delete("delete from docente where Id = $Id");
        return redirect('docente');

    }

    public function index(){

        //$datosD['doc'] = DB::select('select * from docente');
        $datosD['doc'] = DB::select('SELECT d.Id, Email, Pass, d.Nombre, Apellido, Telefono, c.Nombre as curso,tipoUsuario
        FROM docente as d inner join curso as c on d.Id_curso=c.Id;');

        //dd($datosD);
       return view('docente.index',$datosD);
        //return $datosD;

    }

    public function store(Request $request){

        $data = request()->except('_token');

        $email = $_POST['E-mail'];
        $password = $_POST['Password'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $telefono = $_POST['Telefono'];
        $id_curso = $_POST['Curso'];
        $tipo = $_POST['Tipo'];

        DB::insert("INSERT INTO docente (Email,Pass,Nombre,Apellido,Telefono,Id_curso,tipoUsuario) VALUES ('$email','$password','$nombre','$apellido','$telefono','$id_curso','$tipo')");



        //return $data;
        //docente::insert($data);
        //return view("/docente/create");
        //response()->json($data);
        //$resul = "Registrado Exitosamente";
        return view('docente.create');
    }
/*
    public function index(){
        return view('docente.index');
    }
*/
}
