editar Cursos

<!-- Scripts
<script src="{{ asset('js/app.js') }}" defer></script>


<link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

@foreach ($curso as $cur)
<form action="{{ url("/curso/".$cur->Id) }}" method="post" >
@csrf
{{ method_field('PATCH') }}
    <div class="form-group">
        <label for="Nombre" >Nombre: </label><br>
        <input type="text" name="Nombre"  id="Nombre" value="{{ $cur->Nombre }}"><br>
    </div>
    <div class="form-group">
        <label for="Costo" >Costo: </label><br>
        <input type="text" name="Costo"  id="Costo" value="{{ $cur->Costo }}"><br>
    </div>
    <div class="form-group">
        <label for="Descripcion" >Descripcion: </label><br>
        <input type="text" name="Descripcion"  id="Descripcion" value="{{ $cur->Descripcion }}"><br>
    </div>

    <div class="form-group">
        <input type="submit" name="Guardar"  id="Guardar" value="Guardar">
    </div>

</form>
@endforeach
