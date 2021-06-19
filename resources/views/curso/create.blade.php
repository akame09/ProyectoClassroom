

<!-- Scripts
<script src="{{ asset('js/app.js') }}" defer></script>


<link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


@include('menu')
<center>
    <h3>Creacion de Cursos</h3><br>
</center>


<form action="{{ url("/curso") }}" method="post" >
    @csrf
    <div class="form-group">
        <label for="Nombre" >Nombre: </label><br>
        <input type="text" name="Nombre"  id="Nombre"><br>
    </div>
    <div class="form-group">
        <label for="Costo" >Costo: </label><br>
        <input type="text" name="Costo"  id="Costo"><br>
    </div>
    <div class="form-group">
        <label for="Descripcion" >Descripcion: </label><br>
        <textarea name="Descripcion"  id="Descripcion" row = "4"></textarea><br>
    </div>

    <div class="form-group">
        <input type="submit" name="Guardar"  id="Guardar" value="Guardar">
    </div>

</form>


@include('footer')
