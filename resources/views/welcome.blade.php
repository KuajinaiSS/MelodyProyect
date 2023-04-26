<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" src="{{asset('img/MelodyLogo.png')}}">
    <title>Melody</title>
    <link rel="stylesheet" href="{{asset('app.css')}}">
</head>
<body>
    <div class="formulario">
        <h1><img src="{{asset('img/MelodyLogo.png')}}" class = "img" width="40" height="40"> Melody</h1>
        <p>¡Inicia sesión!</p>
        <form methos="post">
            <div class="username">
                <div><label>CORREO ELECTRÓNICO</label></div>
                <input type="text" required>
            </div>
            <div class="password">
                <div><label>CONTRASEÑA</label></div>
                <input type="text" required>
            </div>
            <div class="register"><a href="register.blade.php">¿No tienes cuenta? ¡Registrate aquí!</a></div>
            <input type="submit" value="INGRESAR">
        </form>
    </div>
</body>
</html>
