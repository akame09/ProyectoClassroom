Mostrar lista de Cursos

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
                        <th>Costo</th>
                        <th>Descripcion</th>
                        <th>Botones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cur as $curso)
                        <tr>
                            <td>{{ $curso->Id }}</td>
                            <td>{{ $curso->Nombre }}</td>
                            <td>S/.{{ $curso->Costo }}</td>
                            <td>{{ $curso->Descripcion }}</td>
                            <td>
                                <a href="{{ url('/curso/'.$curso->Id.'/edit') }}">
                                    Editar
                                </a>
                                <form action="{{ url('/curso/'.$curso->Id) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" onclick="return confirm('¿Quieres Eliminar este Curso?')" value="Borrar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
