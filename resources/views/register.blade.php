<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <main class="container align-center p-5">
        <form action="{{route('validar-registro')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" require autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="user" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="user" name="name" require autocomplete="disable">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </main>
    
</body>
</html>