
@foreach ( $dat_gen as $login)

    <a href="">{{ $login->Nombre}}</a>
    <a href="">{{ $login->Apellido}}</a>
    <a href="">{{ $login->tipoUsuario}}</a><br>

@endforeach


@switch($login->tipoUsuario)

    @case("Administrador")
        <a href="{{ url('docente/create') }}">Crear Docente</a><br>
        <a href="#">Crear Curso</a><br>
        <a href="#">Ver Docente</a><br>
        <a href="#">Ver Estudiantes Registrados</a><br>

        @break
    @case("Docente")
        <a href="#">Mi Curso</a><br>
        <a href="#">Subir Archivos</a><br>
        <a href="#">Visualizar Estudiantes</a><br>
        @break
    @case("Estudiante")
        <a href="#">Comprar Cursos</a><br>
        <a href="#">Visualizar mis Cursos</a><br>
    @break

    @default
@endswitch

<form action="{{ url('login') }}" method="get">
    @csrf
    <input type="submit" onclick="return confirm('¿Quieres Salir?')" value="LOGOUT">
</form>

