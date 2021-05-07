<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    use HasFactory;

    private $id;
    private $email;
    private $password;
    private $nombre;
    private $apellido;
    private $telefono;
    private $id_curso;
    private $tipo;


}
