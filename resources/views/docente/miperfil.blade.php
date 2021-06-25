@include('menu')
<center>
<h2>Mi informacion</h2>
</center>
<div class="container">
    <div class="row">
        <div class="col-12">


            @foreach ($MisDatos as $data)

            <label id="l1">Nombre</label><br>
            <input type="text" class="form-control" value="{{ $data->Nombre }}" readonly><br>

            <label id="l1">Apellido</label><br>
            <input type="text" class="form-control" value="{{ $data->Apellido }}" readonly><br>

            <label id="l1">Telefono</label><br>
            <input type="text" class="form-control" value="{{ $data->Telefono }}" readonly><br>

            <label id="l1">E-mail</label><br>
            <input type="text" class="form-control" value="{{ $data->Email }}" readonly><br>

            <label id="l1">Contraseña</label><br>
            <input type="text" class="form-control" value="{{ $data->Pass }}" readonly><br><br>

            @if (session('tipoUsuario')=="Administrador")
                <form action="{{ url('/docente/'.$data->Id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Eliminar?')" value="Borrar">
                </form>
            @endif
            @if (session('tipoUsuario')=="Docente")
                <a class="btn btn-danger" href="{{ url('/docente/'.$data->Id.'/edit') }}">
                    Editar
                </a>
            @endif

            @endforeach
        </div>
    </div>
</div>

@include('footer')
