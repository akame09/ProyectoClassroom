<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!--@php
    use App\Http\Controllers\LoginController;
@endphp-->

<style type="text/css">
#p1{
    border-bottom: none;
	position: relative;
	justify-content: center;
    font-family: 'Times New Roman', Times, serif;
    font-size: 35px;
    color: #838c96;
    text-align: center;
}
#p2{
    border-bottom: none;
    position: relative;
    justify-content: center;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 50px;
    color: #3f0303;
    font-weight: bold;
    margin-top: 20px;

}
#e1{
    background-image: linear-gradient(to right, yellow, white);
}
#e2{
    background-image: linear-gradient(to left, red, white);
}
#e3{
    background-image: linear-gradient(to left, red , yellow,red);
}
.input-group-addon{
    max-width: 42px;
	text-align: center;
	background: none;
	border-bottom: 1px solid white;
	padding-right: 5px;
	border-radius: 0;
}
.form-control{
    min-height: 38px;
	padding-left: 5px;
	box-shadow: none !important;
	border-width: 0 0 1px 0;
	border-radius: 0;
    font-family: Arial, Helvetica, sans-serif;
}
.form-group{
    margin-bottom: 20px;
}
.fa{
    font-size: 21px;
	position: relative;
	top: 12px;
    color: rgb(89, 97, 97);
}
#bt1:hover{
    background: #179b81 !important;
}
#bt1{
    background-image: linear-gradient(to left, red , yellow,red);
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}
#login{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
    color: rgb(90, 86, 86);
    font-weight: bold;
}
</style>

<body >
    <div class="container-fluid">
        <div class="row" id="e3">
            <div class="col-3">
                <br>
                <br>
                <br>
                <br>

            </div>
            <div class="col-6" >
                <center>
                    <u>





                    </u>
                </center>
            </div>
            <div class="col-3">

            </div>
        </div>
        <div class="row bg-white">
                    <div class="col-4" id="e1">

                    </div>
                    <div class="col-4">
                        <form action="{{ url('/login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <center>
                                <div class="form-group">
                                    <br><br><br><h3 id="p1">Iniciar Sesion</h1><br>
                                </div>
                                </center>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" name="Email" id="Email" placeholder="Email">
                                        @error('Email')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
                                        @error('Password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="form-group" id="bt1">
                                    <center>
                                        <input type="submit"  class="btn btn-block btn-lg" name="Login" id="Login" value="Login">
                                        @if (isset($_POST["submit"]))
                                    <span style="color: red">{{ $men }}</span>
                                    @endif
                                </center>
                                </div>
                                <center>
                                <span>No tienes una Cuenta?<a href="{{ "estudiante/create" }}"> Registrate aqui</a></span>
                                </center>
                                <br>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="col-4" id="e2">
                        <br>

                    </div>

        </div>
        <div class="row" id="e3">
            <div class="col">


                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

            </div>
        </div>
    </div>
</body>



