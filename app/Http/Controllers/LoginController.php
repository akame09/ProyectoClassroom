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

    /*public function validacion()
    {
        request()->validate([
            'Email' => 'required',
            'Password' => 'required',
        ]);

        return 'hola';

    }*/

    public function store(Request $request){

        $request->validate([
            'Email' => 'required',
            'Password' => 'required|min:2|max:20'
        ]);

        $email_inicio = $_POST['Email'];
        $pass_inicio = $_POST['Password'];
        //$tipo_inicio = $_POST['Tipo'];
        $dat_gen["dat_gen"] = '';
        $men = '';


        $db_a= DB::select("select * from administrador ");
        $db_d= DB::select("select * from docente");
        $db_e= DB::select("select * from estudiante");

        foreach ($db_a as $admi) {
           if ( $email_inicio == $admi->Email && $pass_inicio == $admi->Pass) {
                $dat_gen["dat_gen"] = DB::select("select * from administrador where Email = '$email_inicio'");
                return view('menu',$dat_gen);
               }else {
                $men = 'Usuario y/o Contraseña incorrecto';
               }
           }

        foreach ($db_d as $doce) {
            if ($email_inicio == $doce->Email && $pass_inicio == $doce->Pass) {
                    $dat_gen["dat_gen"] = DB::select("select * from docente where Email = '$email_inicio'");
                    return view('menu',$dat_gen);
                }else {
                    $men = 'Usuario y/o Contraseña incorrecto';
               }
           }

        foreach ($db_e as $est) {
            if ($email_inicio == $est->Email && $pass_inicio == $est->Pass) {
                    $dat_gen["dat_gen"] = DB::select("select * from estudiante where Email = '$email_inicio'");
                    return view('menu',$dat_gen);
                }else {
                    $men = 'Usuario y/o Contraseña incorrecto';
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
        return $men;
    }

    public function index(){
        return view('login');

    }
}
