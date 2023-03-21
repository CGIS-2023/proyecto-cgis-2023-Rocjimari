<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('csss/app.css')}}">
</head>
<body>
    <div class="container d-flex">
        <div class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">

            <h3 class="text-uppercase text-center">Bienvenido</h3>
        <form action="{{route('cerrarSesion')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary btn-block">Cerrar sesión</button>
            @if (session('success'))
                <div class="alert alert-session alert-dismissible fade show" role="alert">
                    <small >
                        {{$session('success')}}
                    </small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <br>
            <h5>Tienes acceso a: </h5>
            <div class="links">
                    <a href="{{route('pacientes.index')}}">Pacientes</a>
                    
                </div>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" 
    crossorigin="anonymous"></script>
    
</body>
</html>