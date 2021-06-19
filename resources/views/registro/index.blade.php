@include('menu')




<h3>Registrarse en el Curso</h3>

@foreach ($data as $dat)
    @php
        $id_cur = $dat->Id
    @endphp
@endforeach
<p>Id Curso: {{ $id_cur }}</p>

<p>Mi id: {{ session('id') }}</p>


<a href="{{ url('/curso') }}" class="btn btn-danger">cancelar</a>

@include('footer')
