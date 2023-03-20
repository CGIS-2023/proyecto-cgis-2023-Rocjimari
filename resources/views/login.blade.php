<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <main class="container align-center p-5">
            <form action="{{route('validar-registro')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Acceder</button>
                <div class="mb-3 form-check">
                    <input type="checkBox" class="form-check-input"  id="rememberCheck" name="remember" >
                    <label for="rememberCheck" class="form-check-label">Mantener sesión iniciada</label>
                </div>
                <div>
                <p>¿No tienes cuenta? <a href="{{route('registro')}}">Registrarse</a></p>
                </div>
                
            </form>
            
    </main>
    
</body>
</html>