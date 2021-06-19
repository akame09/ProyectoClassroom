@include('menu')

@foreach ($consul as $conn)
<form action="{{ url("/docente/".$conn->Id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
    <div class="form-group">
        <label for="E-mail" >E-mail: </label><br>
        <input type="email" name="E-mail" id="E-mail"  value="{{ $conn->Email }}">
        @error('E-mail')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Password" >Password: </label><br>
        <input type="password" name="Password" id="Password" value="{{ $conn->Pass }}">
        @error('Password')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Nombre" >Nombre: </label><br>
        <input type="text" name="Nombre"  id="Nombre" value="{{ $conn->Nombre }}">
        @error('Nombre')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Apellido">Apellido: </label><br>
        <input type="text" name="Apellido" id="Apellido" value="{{ $conn->Apellido }}">
        @error('Apellido')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Telefono">Telefono: </label><br>
        <input type="number" name="Telefono" id="Telefono" value="{{ $conn->Telefono }}">
        @error('Telefono')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <input type="submit" name="Guardar"  id="Guardar" value="Guardar">
    </div>


</form>
@endforeach

@include('footer')
