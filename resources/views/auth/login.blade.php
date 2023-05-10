<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <title>Inciar sesión - Melody</title>
    @vite('resources/css/form.css')
</head>
<body>
    <div class="forms">
        <div class="logo">
            <img src="{{asset('img/MelodyLogo.png')}}" class ="img" width="45" height="45">
            <h1 class="logoNombre">Melody</h1>
        </div>
        <p>¡Inicia sesión!</p>
        <form action="{{route('login')}}" method="POST" novalidate>
            @csrf
            <div class="name">
                <div><label>CORREO ELECTRÓNICO</label></div>
                <input type="text">
            </div>
            <div class="password">
                <div><label>CONTRASEÑA</label></div>
                <input type="text" >
            </div>

            <div class="register"><a href="{{route('register')}}">¿No tienes cuenta? ¡Registrate aquí!</a></div>
            <input type="submit" value="INGRESAR">
        </form>

    </div>
</body>
</html>
