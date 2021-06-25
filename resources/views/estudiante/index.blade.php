@include('menu')
<center>
    <h2>Visualizar Estudiantes Registrados</h2><br>
</center>

<div class="container">
    <div class="row">
        <div class="col-12 text-right">
            <table class="table table-dark" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Estudiante</th>
                        <th>Curso</th>
                        <th>Docente Encargado</th>
                        <th>Botones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($datosE as $reg)
                        <tr>
                            <td>{{ $reg->Id }}</td>
                            <td>{{ $reg->Estudiante }}</td>
                            <td>{{ $reg->Nombre_Curso }}</td>
                            <td>{{ $reg->Docente }}</td>
                            <td>
                                @if (session('tipoUsuario')=="Administrador")
                                    <form action="{{ url('/estudiante/'.$reg->Id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Quieres Eliminar?')" value="Eliminar">
                                    </form>
                                @endif
                                @if (session('tipoUsuario')=="Docente")
                                    <a href="{{ url('/docente/'.$reg->Id.'/edit') }}">
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
