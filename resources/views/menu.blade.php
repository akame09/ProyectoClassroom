<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
    #bf1{
        background-image: linear-gradient(to left, red , yellow,red);
    }
    #r2{
        border: 1px;
        border-color: black;
    }
</style>
@foreach ( $dat_gen as $login)
<div class="container-fluid" id="bf1">
    <div class="row">
        <div class="col-2">
            <nav class="navbar navbar-expand-lg bg-dark" id="r2">
                <li class="nav-item nav-link">{{ $login->Nombre}} {{ $login->Apellido}}</li>
            </nav>
        </div>
        <div class="col-2">

        </div>
        <div class="col-8">
            <nav class="navbar navbar-expand-lg bg-dark" id="r2">
                <div class="container-fluid">
                    <div >
                        <ul class="navbar-nav">




                            <!--<a href="">{{ $login->tipoUsuario}}</a> -->

                        @switch($login->tipoUsuario)

                            @case("Administrador")

                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/docente/create') }}">Crear Docente</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/curso/create') }}" >Crear Curso</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/docente') }}" >Ver Docente</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="#" >Ver Estudiantes Registrados</a></li>

                                @break
                            @case("Docente")
                                <li class="nav-item nav-link" id="r1"><a href="#">Mi Curso</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="#">Subir Archivos</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="#">Visualizar Estudiantes</a></li>
                                @break
                            @case("Estudiante")
                                <li class="nav-item nav-link" id="r1"><a href="#">Comprar Cursos</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="#">Visualizar mis Cursos</a></li>
                            @break

                            @default
                        @endswitch

                            <li class="btn"><a href="{{ url('login') }}" onclick="return confirm('¿Quieres Salir?')">LOGOUT</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endforeach
<div class="container-fluid">
    <div class="row">
        <div class="col-3 bg-info">

        </div>
        <div class="col-6">
            @yield('contenido')

@extends('footer')






