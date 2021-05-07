editar docentes

@foreach ($consul as $conn)
<form action="{{ url("/docente/".$conn->Id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
    <div class="form-group">
        <label for="E-mail" >E-mail: </label><br>
        <input type="email" name="E-mail" id="E-mail"  value="{{ $conn->Email }}"><br>
    </div>
    <div class="form-group">
        <label for="Password" >Password: </label><br>
        <input type="password" name="Password" id="Password" value="{{ $conn->Pass }}"><br>
    </div>
    <div class="form-group">
        <label for="Nombre" >Nombre: </label><br>
        <input type="text" name="Nombre"  id="Nombre" value="{{ $conn->Nombre }}"><br>
    </div>
    <div class="form-group">
        <label for="Apellido">Apellido: </label><br>
        <input type="text" name="Apellido" id="Apellido" value="{{ $conn->Apellido }}"><br>
    </div>
    <div class="form-group">
        <label for="Telefono">Telefono: </label><br>
        <input type="number" name="Telefono" id="Telefono" value="{{ $conn->Telefono }}"><br>
    </div>
    <div class="form-group">
        <label for="Curso">Curso: </label><br>
        <select name="Curso" id="Curso" value="{{ $conn->Id_curso }}">
            <option value="1">Administracion</option>
            <option value="2">Contabilidad</option>
            <!--<option value="Administrador">Administrador</option>
            <option value="Estudiante">Estudiante</option> -->
        </select><br>
    </div>
    <div class="form-group">
        <label for="Tipo">Tipo de Usuario: </label><br>
        <input type="text" name="Tipo"  id="Tipo" value="{{ $conn->tipoUsuario }}" readonly><br>
    </div>
    <div class="form-group">
        <input type="submit" name="Guardar"  id="Guardar" value="Guardar">
    </div>


</form>
@endforeach
