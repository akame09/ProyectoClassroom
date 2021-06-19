

<script src="{{ asset('js/app.js') }}" defer></script>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@include('menu')


<div class="container" style="justify-content: center">
    <div class="row">
        @switch(session('tipoUsuario'))
            @case("Administrador")
                <h3>Cursos</h3>
                @foreach ($cur as $curso)
                    <div class="col-4" style=" margin-top:17px">
                        <div class="card" style="width: 20rem;">
                            <img src="{{ asset('js/c.jpg') }}" class="card-img-top" alt="5rm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->Nombre }}</h5>
                                <p class="card-text">S/.{{ $curso->Costo }}</p>
                                <p class="card-text">{{ $curso->Descripcion }}</p>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ url('/curso/'.$curso->Id.'/edit') }}" class="btn btn-primary btn-lg">Editar</a>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{ url('/curso/'.$curso->Id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input class="btn btn-danger btn-lg" type="button" onclick="return confirm('¿Quieres Eliminar este Curso?')" value="Borrar">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    @endforeach
                @break
            @case("Estudiante")
            <h3>Cursos Disponibles</h3>
            @php
                $id = session('id');
                $all= DB::select('select * from curso order by(Id)');
                $cur = DB::select("select c.Id,c.Nombre, c.Nombre, c.Costo, c.Descripcion from curso as c
                            join registromatricula as r on r.Id_curso=c.Id
                            join estudiante as e on e.Id=r.Id_estudiante where e.Id='$id' order by(c.Id)");
                $resultado = $all;
                for ($i=0; $i < count($all); $i++) {
                    for ($j=0; $j < count($cur) ; $j++) {
                        if ($cur[$j]->Id==$all[$i]->Id && $cur[$j]->Nombre==$all[$i]->Nombre) {
                            unset($resultado[$i]);
                        }
                    }
                }
            @endphp
                @foreach ($resultado as $curso)
                    <div class="col-4" style=" margin-top:17px">
                        <div class="card" style="width: 20rem;">
                            <img src="{{ asset('js/c.jpg') }}" class="card-img-top" alt="5rem">
                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->Nombre }}</h5>
                                <p class="card-text">S/.{{ $curso->Costo }}</p>
                                <p class="card-text">{{ $curso->Descripcion }}</p>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            @php
                                                $sd = $curso->Id;
                                            @endphp
                                            <a id="submit" name="submit" onclick="return confirm('¿Estas seguro de registrarte en este curso?')" href="{{ url('/buscar-curso/'.$sd.'/registro')}}" class="btn btn-primary">Registrarse</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    @endforeach
                @break
            @default

        @endswitch

    </div>
</div>

@include('footer')
