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




        /*if (($clave = array_search("Chau", $textos)) !== false) {
            unset($textos[$clave]);
            print_r($textos);
        }*/

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
        if (session('tipoUsuario')=="Docente") {
            $dat_id = session('id');
            $MisDatos['MisDatos'] = DB::select("select c.Id as 'Id', c.Nombre as 'Curso', c.Descripcion as 'Descripcion', count(e.id) from curso as c
                                                join docente as d on d.Id_Curso = c.Id
                                                join registromatricula as r on r.Id_curso=c.Id
                                                join estudiante as e on e.Id=r.Id_estudiante where d.Id='$dat_id'");
        }elseif (session('tipoUsuario')=="Estudiante") {
            $dat_id = session('id');
            $MisDatos['MisDatos'] = DB::select("select e.Id, c.Id, c.Nombre as 'Curso',c.Costo as 'Costo', c.Descripcion as 'Descripcion',concat( d.Nombre,' ', d.Apellido) as 'Docente' from curso as c
                                                join docente as d on d.Id_Curso = c.Id
                                                join registromatricula as r on r.Id_curso=c.Id
                                                join estudiante as e on e.Id=r.Id_estudiante where e.Id='$dat_id'");
        }

    return view('curso.micurso',$MisDatos);
    }

    public function getId(int $sd){

        $data['data'] = DB::select("SELECT * FROM curso where id= '$sd'");

        return view('/registro', $data);
    }
}
