

<!-- Scripts
<script src="{{ asset('js/app.js') }}" defer></script>

7
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

@include('menu')

@php
    use Illuminate\Support\Facades\DB;

    $cur = DB::select("select * from curso");
@endphp
<center>
    <h3>Creacion de Usuarios(Docente)</h2>
</center>

<form action="{{ url("/docente") }}" method="post" >
    @csrf
    <div class="form-group">
        <label for="E-mail" >E-mail: </label><br>
        <input type="email" name="E-mail" id="E-mail"  ><br>
        @error('E-mail')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Password" >Password: </label><br>
        <input type="password" name="Password" id="Password"><br>
        @error('Password')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Nombre" >Nombre: </label><br>
        <input type="text" name="Nombre"  id="Nombre"><br>
        @error('Nombre')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Apellido">Apellido: </label><br>
        <input type="text" name="Apellido" id="Apellido"><br>
        @error('Apellido')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Telefono">Telefono: </label><br>
        <input type="number" name="Telefono" id="Telefono"><br>
        @error('Telefono')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Curso">Curso: </label><br>
        <select name="Curso" id="Curso"">
            @foreach ($cur as $curs)
                <option value= {{ $curs->Id }}>{{ $curs->Nombre }}</option>
            @endforeach
            <!--<option value="Administrador">Administrador</option>
            <option value="Estudiante">Estudiante</option> -->
        </select><br>
    </div>
    <div class="form-group">
        <label for="Tipo">Tipo de Usuario: </label><br>
        <input type="text" name="Tipo"  id="Tipo" value="Docente" readonly><br>
    </div>
    <div class="form-group">
        <input type="submit" name="Guardar"  id="Guardar" value="Guardar">
    </div>

</form>


@include('footer')
