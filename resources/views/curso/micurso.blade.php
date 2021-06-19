<script src="{{ asset('js/app.js') }}" defer></script>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@include('menu')



<div class="container" style="justify-content: center">
    <div class="row">
        @switch(session('tipoUsuario'))
            @case("Docente")
            <center>
                <h3>Mi Curso</h3>
            </center>
                @foreach ($MisDatos as $data)
                <div class="col-4" style=" margin-top:17px">
                    <div class="card" style="width: 20rem;">
                        <img src="{{ asset('js/c.jpg') }}" class="card-img-top" alt="5rem">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->Curso }}</h5>
                            <p class="card-text">Id: {{ $data->Id }}</p>
                            <p class="card-text">{{ $data->Descripcion }}</p>


                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <a  href="" class="btn btn-primary">Ver Mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                @endforeach
                @break
            @case("Estudiante")
            <center>
                <h3>Mis Cursos</h3>
            </center>
                @foreach ($MisDatos as $data)
                <div class="col-4" style=" margin-top:17px">
                    <div class="card" style="width: 20rem;">
                        <img src="{{ asset('js/c.jpg') }}" class="card-img-top" alt="5rem">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->Curso }}</h5>
                            <p class="card-text">Docente: {{ $data->Docente }}</p>
                            <p class="card-text">{{ $data->Descripcion }}</p>


                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <a  href="#" class="btn btn-primary">Ver Mas</a>
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
