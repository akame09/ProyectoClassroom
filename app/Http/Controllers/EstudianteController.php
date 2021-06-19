<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiante;
use App\Models\curso;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    //

    public function create(){
        return view('estudiante.create');
    }

    public function destroy($Id){

        DB::delete("delete from registromatricula where Id = $Id");
        return redirect('estudiante');

    }

    public function edit($Id){

        $consul["consul"] = DB::select("select * from estudiante where Id = $Id");

        $men = '';

        session(['mensaje_do' => $men]);
        return view('estudiante.edit',$consul);
    }

    public function show(){

        if (session('tipoUsuario')=="Docente") {
            $dat_id = session('id_cur');
            $cant_est = DB::select("select count(e.Id) as 'Cantidad', c.Nombre as 'Curso' from estudiante as e join registromatricula as r on e.Id=r.Id_estudiante
            join curso as c on r.Id_curso=c.Id where c.Id='$dat_id'");
            foreach ($cant_est as $cantidad) {
                $cant = $cantidad->Cantidad;
                $nombre_curso = $cantidad->Curso;
            }
            session(['curso_name' => $nombre_curso]);
            session(['cantidad' => $cant]);

            $MisDatos['MisDatos'] = DB::select("select concat(e.nombre,' ',e.apellido) as 'Estudiante',e.telefono as 'Telefono'
                                                from estudiante as e
                                                join registromatricula as r on e.Id=r.Id_estudiante
                                                join curso as c on r.Id_curso=c.Id
                                                join docente as d on d.Id_curso=c.Id where c.id='$dat_id'");
        }else {
            $dat_id = session('id');
            $MisDatos['MisDatos'] = DB::select("select Id, Email, Pass, Nombre, Apellido, Telefono, tipoUsuario from estudiante where Id='$dat_id'");
        }


        return view('estudiante.miperfil',$MisDatos);
    }

    public function index(){

        //$datosD['doc'] = DB::select('select * from docente');
        $datosE['datosE'] = DB::select("select r.Id, concat(e.nombre,' ',e.apellido) as 'Estudiante', c.nombre as 'Nombre_Curso', concat(d.nombre,' ',d.apellido) as 'Docente'
        from estudiante as e
        join registromatricula as r on e.Id=r.Id_estudiante
        join curso as c on r.Id_curso=c.Id
        join docente as d on d.Id_curso=c.Id order by(r.Id);");

        //dd($datosD);
       return view('estudiante.index',$datosE);
        //return $datosD;

    }

    public function store(Request $request){

        $request->validate([
            'Email' => 'required',
            'Password' => 'required|min:2|max:20',
            'Nombre' => 'required|alpha',
            'Apellido' => 'required|alpha',
            'Telefono' => 'required',
        ]);

        $data = request()->except('_token');

        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $telefono = $_POST['Telefono'];
        $tipo = $_POST['Tipo'];

        DB::insert("INSERT INTO estudiante (Email,Pass,Nombre,Apellido,Telefono,tipoUsuario) VALUES ('$email','$password','$nombre','$apellido','$telefono','$tipo')");



        //return $data;
        //docente::insert($data);
        //return view("/docente/create");
        //response()->json($data);
        //$resul = "Registrado Exitosamente";
        return view('login');
    }

    public function update(Request $request, $Id){


        $data = request()->except(['_token','_method']);

        $email = $_POST['E-mail'];
        $password = $_POST['Password'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $telefono = $_POST['Telefono'];
        $tipo = $_POST['Tipo'];

        DB::update("UPDATE estudiante
        SET Email='$email' , Pass='$password', Nombre='$nombre' , Apellido='$apellido', Telefono='$telefono' , tipoUsuario='$tipo'
        WHERE Id='$Id'
        ORDER BY(Id)");
        $men = 'Actualizado correctamente';

        session(['mensaje_do' => $men]);

        $consul["consul"] = DB::select("select * from estudiante where Id = $Id");

        //return redirect('docente');
        return view('estudiante.edit',$consul);
    }
}



//MOSTRAR CURSOS DEL ESTUDIANTE

/*select c.nombre, c.costo, c.descripcion from curso as c
join registromatricula as r on r.Id_curso=c.Id
join estudiante as e on e.Id=r.Id_estudiante where e.Id=1;*/
