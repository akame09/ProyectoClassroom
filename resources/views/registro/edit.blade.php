@include('menu')

<h3>Registrarse en el Curso</h3>
@php
    use Illuminate\Support\Facades\DB;

    $id_cur = session('id_curso_registro');
    $data_curso = DB::select("select * from curso where id = '$id_cur'")

    /*<p>Id Curso: {{ session('id_curso_registro') }}</p>

    <p>Mi id: {{ session('id') }}</p>*/
@endphp
@foreach ($data_curso as $curso)
        <label id="l1">Asignatura</label>
        <input class="form-control" type="text" name="Nombre" id="Nombre" value="{{ $curso->Nombre }}" readonly>

        <label id="l1">Precio</label>
        <input class="form-control" type="text"  value="S/.{{ $curso->Costo }}" readonly>

        <label id="l1">Descripcion</label>
        <input class="form-control" type="text" name="" id="" value="{{ $curso->Descripcion }}" readonly><br>

        <a class="btn btn-danger" href="{{ url('/registro') }}">Registrarse</a>

@endforeach
@include('footer')
