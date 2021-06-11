

<script src="{{ asset('js/app.js') }}" defer></script>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@include('menu')


<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-dark" border="1">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($MisDatos as $cur)
                        <tr>
                            <td>{{ $cur->Id }}</td>
                            <td>{{ $cur->Nombre }}</td>
                            <td>{{ $cur->Descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('footer')
