<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\docente;
use App\Models\estudiante;
use App\Models\administrador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Else_;

class LoginController extends Controller
{
    //

    public function store(Request $request){

        $request->validate([
            'Email' => 'required',
            'Password' => 'required|min:2|max:20'
        ]);

        $email_inicio = $_POST['Email'];
        $pass_inicio = $_POST['Password'];
        //$tipo_inicio = $_POST['Tipo'];
        //$dat_gen["dat_gen"] = '';
        $men = '';

            /*session(['nombre' => '$nombre']);
            session(['apellido' => $dat_gen->Apellido]);
            session(['id' => $dat_gen->Id]);
            session(['tipoUsuarios' => $dat_gen->tipoUsuario]);*/




        $db_a= DB::select("select * from administrador ");
        $db_d= DB::select("select * from docente");
        $db_e= DB::select("select * from estudiante");

        foreach ($db_a as $admi) {
           if ( $email_inicio == $admi->Email && $pass_inicio == $admi->Pass) {
                $dat_gen = DB::select("select * from administrador where Email = '$email_inicio'");

                //variables obtenidos de la base de datos
                foreach ($dat_gen as $dat) {
                    $nombre = $dat->Nombre;
                    $apellido = $dat->Apellido;
                    $tipoUsuario = $dat->tipoUsuario;
                    $id = $dat->Id;
                }

                session(['nombre' => $nombre]);
                session(['apellido' => $apellido]);
                session(['tipoUsuario' => $tipoUsuario]);
                session(['id' => $id]);
                session(['error' => '']);
                session(['id_cur' => '']);

                return view('indexIni');
                //return view('menu',$dat_gen);
               }else {
                $men = 'Usuario y/o Contraseña incorrecta';
                session(['error' => $men]);
               }
           }

        foreach ($db_d as $doce) {
            if ($email_inicio == $doce->Email && $pass_inicio == $doce->Pass) {
                    $dat_gen = DB::select("select * from docente where Email = '$email_inicio'");

                    foreach ($dat_gen as $dat) {
                        $nombre = $dat->Nombre;
                        $apellido = $dat->Apellido;
                        $tipoUsuario = $dat->tipoUsuario;
                        $id = $dat->Id;
                        $id_cur = $dat->Id_curso;
                    }

                    session(['nombre' => $nombre]);
                    session(['apellido' => $apellido]);
                    session(['tipoUsuario' => $tipoUsuario]);
                    session(['id' => $id]);
                    session(['error' => '']);
                    session(['id_cur' => $id_cur]);

                    return view('indexIni');
                }else {
                    $men = 'Usuario y/o Contraseña incorrecta';
                    session(['error' => $men]);
               }
           }

        foreach ($db_e as $est) {
            if ($email_inicio == $est->Email && $pass_inicio == $est->Pass) {
                    $dat_gen = DB::select("select * from estudiante where Email = '$email_inicio'");

                    foreach ($dat_gen as $dat) {
                        $nombre = $dat->Nombre;
                        $apellido = $dat->Apellido;
                        $tipoUsuario = $dat->tipoUsuario;
                        $id = $dat->Id;
                    }

                    session(['nombre' => $nombre]);
                    session(['apellido' => $apellido]);
                    session(['tipoUsuario' => $tipoUsuario]);
                    session(['id' => $id]);
                    session(['error' => '']);
                    session(['id_cur' => '']);

                    return view('indexIni');
                }else {
                    $men = 'Usuario y/o Contraseña incorrecta';
                    session(['error' => $men]);
               }
           }

        /*if ($tipo_inicio == "Administrador") {
            $dat_gen["dat_gen"] = DB::select("select * from administrador where Email = '$email_inicio'");
        }elseif ($tipo_inicio == "Docente") {
            $dat_gen["dat_gen"] = DB::select("select * from docente where Email = '$email_inicio'");
        }else {
            $dat_gen["dat_gen"] = DB::select("select * from estudiante where Email = '$email_inicio'");
        }*/

        /*if ($men ='') {
            return view('menu',$dat_gen);
        }else {
            return 'Hola';
        }*/


        //return redirect('login')->with($men);

        return view('login');
    }

    public function index(){
        $men = "";
        session(['error' => $men]);

        return view('login');

    }
    public function inicio(){
        return view('indexIni');
    }
}
