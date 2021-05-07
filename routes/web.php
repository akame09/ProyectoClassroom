<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CursoController;
use models\curso;
use models\docente;
use models\estudiante;
use models\registromatricula;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/docentes', function () {
    return view('docente.index');
});

Route::get('/docentes/create',[DocenteController::class,'create']);*/

Route::resource('/docente', DocenteController::class);

Route::resource('/curso', CursoController::class);


//ARCHIVOS DE LA DATA BASE
/*
Route::get('/estudiante', function () {
    $resultados = DB::select('select * from estudiante');
    dd($resultados);
});

Route::get('/docente', function () {
    $resultados = DB::select('select * from docente');
    dd($resultados);
});

Route::get('/curso', function () {
    $resultados = DB::select('select * from curso');
    dd($resultados);
});

Route::get('/administrador', function () {
    $resultados = DB::select('select * from administrador');
    dd($resultados);
});

Route::get('/tiposusuarios', function () {
    $resultados = DB::select('select * from tipo_usuario');
    dd($resultados);
});

Route::get('/registromatricula', function () {
    $resultados = DB::select('select * from RegistroMatricula');
    dd($resultados);
});*/
