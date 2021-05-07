Mostrar lista de docentes

<script src="{{ asset('js/app.js') }}" defer></script>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-dark" border="1">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>E-mail</th>
                        <th>Contraseña</th>
                        <th>Curso</th>
                        <th>Tipo de Usuario</th>
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
                                <a href="{{ url('/docente/'.$docente->Id.'/edit') }}">
                                    Editar
                                </a>
                                <form action="{{ url('/docente/'.$docente->Id) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" onclick="return confirm('¿Quieres Eliminar?')" value="Borrar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
