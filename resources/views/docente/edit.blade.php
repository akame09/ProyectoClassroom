@include('menu')
<center>
<h2>Actualizar Datos</h2>
</center>
@foreach ($consul as $conn)
<form action="{{ url("/docente/".$conn->Id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
    <div class="form-group">
        <label for="E-mail" id="l1">E-mail: </label><br>
        <input class="form-control" type="email" name="E-mail" id="E-mail"  value="{{ $conn->Email }}">
        @error('E-mail')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Password" id="l1">Password: </label><br>
        <input class="form-control" type="password" name="Password" id="Password" value="{{ $conn->Pass }}">
        @error('Password')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Nombre" id="l1">Nombre: </label><br>
        <input class="form-control" type="text" name="Nombre"  id="Nombre" value="{{ $conn->Nombre }}">
        @error('Nombre')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Apellido" id="l1">Apellido: </label><br>
        <input class="form-control" type="text" name="Apellido" id="Apellido" value="{{ $conn->Apellido }}">
        @error('Apellido')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group" >
        <label for="Telefono" id="l1">Telefono: </label><br>
        <input class="form-control" type="number" name="Telefono" id="Telefono" value="{{ $conn->Telefono }}">
        @error('Telefono')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-danger" name="Guardar"  id="Guardar" value="Guardar">
    </div>


</form>
@endforeach

@include('footer')
