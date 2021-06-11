<?php

namespace App\Http\Controllers;

use App\Models\curso;
use App\Models\registromatricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    //
    public function index(){

        //$datosD['doc'] = DB::select('select * from docente');
        $curso['cur'] = DB::select('select * from curso');

        //dd($datosD);
       return view('curso.index',$curso);

    }

    public function destroy($Id){

        DB::delete("delete from curso where Id = $Id");
        return redirect('curso');

    }

    public function create(){
        return view('curso.create');
    }

    public function edit($Id){

        $curso["curso"] = DB::select("select * from curso where Id = $Id");

        return view('curso.edit',$curso);
    }

    public function update(Request $request, $Id){

        $data = request()->except(['_token','_method']);

        $nombre = $_POST['Nombre'];
        $costo = $_POST['Costo'];
        $descripcion = $_POST['Descripcion'];

        DB::update("UPDATE curso
        SET Nombre='$nombre' , Costo= $costo , Descripcion='$descripcion'
        WHERE Id='$Id'
        ORDER BY(Id)");

        $curso["curso"] = DB::select("select * from curso where Id = $Id");

        //return redirect('docente');
        return view('curso.edit',$curso);
    }

    public function store(Request $request){

        $data = request()->except('_token');

        $nombre = $_POST['Nombre'];
        $costo = $_POST['Costo'];
        $descripcion = $_POST['Descripcion'];

        DB::insert("INSERT INTO curso (Nombre,Costo,Descripcion) VALUES ('$nombre','$costo','$descripcion')");

        return view('curso.create');
    }

    public function registro(Request $request){

    }

    public function show(){
        $dat_id = session('id');
        $MisDatos['MisDatos'] = DB::select("select c.Id, c.Nombre, c.Descripcion from curso as c join docente as d on d.id_curso=c.id where d.id = '$dat_id'");

        return view('curso.micurso',$MisDatos);
    }
}
