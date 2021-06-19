@include('menu')

<div class="container">
    <div class="row">
        <div class="col-12">
                @switch(session('tipoUsuario'))
                    @case("Docente")
                    <h3>Cantidad de Estudiantes: {{ session('cantidad') }} {{ session('curso_name') }}</h3>
                    <table class="table table-dark" border="1">
                        <thead class="thead-dark">
                            <tr>
                                <th>Estudiante</th>
                                <th>Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($MisDatos as $data)
                                <tr>
                                    <td>{{ $data->Estudiante }}</td>
                                    <td>{{ $data->Telefono }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        @break
                    @case("Administrador")
                    <h3>Mis Datos</h3>
                    <table class="table table-dark" border="1">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>E-mail</th>
                                <th>Contraseña</th>
                                <th>Tipo</th>
                                <th>Botones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($MisDatos as $data)
                                <tr>
                                    <td>{{ $data->Id }}</td>
                                    <td>{{ $data->Nombre }}</td>
                                    <td>{{ $data->Apellido }}</td>
                                    <td>{{ $data->Telefono }}</td>
                                    <td>{{ $data->Email }}</td>
                                    <td>{{ $data->Pass }}</td>
                                    <td>{{ $data->tipoUsuario }}</td>
                                    <td>
                                            @if (session('tipoUsuario')=="Administrador")
                                                <form action="{{ url('/estudiante/'.$data->Id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Eliminar?')" value="Borrar">
                                                </form>
                                            @endif
                                            @if (session('tipoUsuario')=="Estudiante")
                                                <a href="{{ url('/estudiante/'.$data->Id.'/edit') }}">
                                                    Editar
                                                </a>
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        @break
                    @case("Estudiante")
                    <h3>Mis Datos</h3>
                    <table class="table table-dark" border="1">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>E-mail</th>
                                <th>Contraseña</th>
                                <th>Tipo</th>
                                <th>Botones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($MisDatos as $data)
                                <tr>
                                    <td>{{ $data->Id }}</td>
                                    <td>{{ $data->Nombre }}</td>
                                    <td>{{ $data->Apellido }}</td>
                                    <td>{{ $data->Telefono }}</td>
                                    <td>{{ $data->Email }}</td>
                                    <td>{{ $data->Pass }}</td>
                                    <td>{{ $data->tipoUsuario }}</td>
                                    <td>
                                            @if (session('tipoUsuario')=="Administrador")
                                                <form action="{{ url('/estudiante/'.$data->Id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Eliminar?')" value="Borrar">
                                                </form>
                                            @endif
                                            @if (session('tipoUsuario')=="Estudiante")
                                                <a href="{{ url('/estudiante/'.$data->Id.'/edit') }}">
                                                    Editar
                                                </a>
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        @break
                    @default
                @endswitch
        </div>
    </div>
</div>

@include('footer')
