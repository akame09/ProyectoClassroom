

@include('menu')
<center>
    <h3>Visualizacion de Usuarios(Docente)</h2><br>
</center>

<div class="container">
    <div class="row">
        <div class="col-12 text-right">
            <table class="table table-dark" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>E-mail</th>
                        <th>Contraseña</th>
                        <th>Curso</th>
                        <th>Tipo</th>
                        <th>Botones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($doc as $docente)
                        <tr>
                            <td>{{ $docente->Id }}</td>
                            <td>{{ $docente->Nombre }}</td>
                            <td>{{ $docente->Apellido }}</td>
                            <td>{{ $docente->Telefono }}</td>
                            <td>{{ $docente->Email }}</td>
                            <td>{{ $docente->Pass }}</td>
                            <td>{{ $docente->curso }}</td>
                            <td>{{ $docente->tipoUsuario }}</td>
                            <td>
                                @if (session('tipoUsuario')=="Administrador")
                                    <form action="{{ url('/docente/'.$docente->Id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Quieres Eliminar?')" value="Eliminar">
                                    </form>
                                @endif
                                @if (session('tipoUsuario')=="Docente")
                                    <a href="{{ url('/docente/'.$docente->Id.'/edit') }}">
                                        Editar
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('footer')

