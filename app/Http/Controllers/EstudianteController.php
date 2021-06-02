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
}
