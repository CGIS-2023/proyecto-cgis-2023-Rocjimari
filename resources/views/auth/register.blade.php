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
<body>
    <div class="container d-flex">
        <form action="" method="POST" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
            @csrf
            <h2 class="text-center">
                Register
            </h2>
            
            <div class="form-group">
                <label for="inputEmail">Nombre</label>
                <input type="name" name = "name" value="{{ old('name') }}" id="inputname" class="form-control" 
                aria-describedby="nameHelp" placeholder="Enter name">
                @error('name')
                    <small class="text-danger mt-1">
                        <strong>{{$message}}</strong>
                    </small>
                @enderror
            </div>
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
            <div class="form-group">
                <label for="inputPassword">Password confirmation</label>
                <input type="password" name = "password_confirmation" id="inputPassword" class="form-control" placeholder="Password">
                @error('password_confirmation')
                    <small class="text-danger mt-1">
                        <strong>{{$message}}</strong>
                    </small>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary btn-block">Resgistrarme</button>
            <div><a href="{{route('login')}}">Login</a></div>
            
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