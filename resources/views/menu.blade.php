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


 <!--



    string $nom = session('nombre');
    string $ape = session('apellido');
    string $tipo = session('tipoUsuario');
    int $id = session('id'); -->




<div class="container-fluid" id="bf1">
    <div class="row">
        <div class="col-2">
            <nav class="navbar navbar-expand-lg bg-dark" id="r2">
               <!-- <li class="nav-item nav-link"></li> -->
               <center>
                <li class="nav-item nav-link">{{ session('nombre') }} {{ session('apellido') }}</li>
               </center>

            </nav>
        </div>
        <div class="col-2">
        </div>
        <div class="col-8">
            <nav class="navbar navbar-expand-lg bg-dark" id="r2">
                <div class="container-fluid">
                    <div >
                        <ul class="navbar-nav">




                            <!--<a href=""></a> -->

                        @switch(session('tipoUsuario'))

                            @case("Administrador")
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('indexIni') }}">Inicio</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/docente/create') }}">Crear Docente</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/curso/create') }}" >Crear Curso</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/docente') }}" >Ver Docente</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/curso') }}" >Ver Cursos</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/estudiante') }}" >Ver Estudiantes Registrados</a></li>

                                @break
                            @case("Docente")
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('indexIni') }}">Inicio</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/docente/show')}}">Mi Perfil</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/curso/show')}}">Mi Curso</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="#">Subir Archivos</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/estudiante/show')}}">Visualizar Estudiantes</a></li>
                                @break
                            @case("Estudiante")
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('indexIni') }}">Inicio</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/estudiante/show')}}">Mi Perfil</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/curso') }}">Comprar Cursos</a></li>
                                <li class="nav-item nav-link" id="r1"><a href="{{ url('/curso/show') }}">Visualizar mis Cursos</a></li>
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
<!--  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">
            <br>








