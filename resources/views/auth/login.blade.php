<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('csss/app.css')}}">
</head>
</head>
<body>
    <div class="container d-flex">
        <form action="{{route('login.verify')}}" method="POST" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
            @csrf
            <h2 class="text-center">
                Login
            </h2>
            @error('invalid_credentials')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small class="text-danger mt-1">
                        {{$message}}
                    </small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    
            @enderror
            @if(session('mensaje'))
                <div class="alert alert-success">
                    {{session('mensaje')}}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <small >
                        {{session('success')}}
                    </small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" name = "email" value="{{ old('email') }}" id="inputEmail" class="form-control" 
                aria-describedby="emailHelp" placeholder="Enter email">
                @error('email')
                    <small class="text-danger mt-1">
                        <strong>{{$message}}</strong>
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password">
                @error('password')
                    <small class="text-danger mt-1">
                        <strong>{{$message}}</strong>
                    </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <div><a href="{{route('register')}}">Registrarme</a></div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    
</body>
</html>