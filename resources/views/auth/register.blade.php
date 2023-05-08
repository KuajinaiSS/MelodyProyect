<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <title>Crear cuenta - Melody</title>
    @vite('resources/css/form.css')
</head>
<body>
    <div class="forms">
        <h1><img src="{{asset('img/MelodyLogo.png')}}" class = "img" width="40" height="40" > Melody</h1>
        <p>¡Crea tu cuenta!</p>
        <form action="{{route('register')}}" method="POST" novalidate>
            @csrf
            <div class="name">
                <div><label>NOMBRE</label></div>
                <input id="name" name="name" type="text" width="400px">
                @error('name')
                    <div class="errorMsg"><p>{{ $message }}</p></div>
                @enderror
            </div>
            <div class="email">
                <div><label>CORREO ELECTRÓNICO</label></div>
                <input id="email" name="email" type="text">
                @error('email')
                <div class="errorMsg"><p>{{ $message }}</p></div>
                @enderror
            </div>
            <div class="password">
                <div><label>CONTRASEÑA</label></div>
                <input id="password" name="password" type="password">
                @error('password')
                <div class="errorMsg"><p>{{ $message }}</p></div>
                @enderror
            </div>
            <div class="register"><a href="{{route('login')}}">¿Ya tienes cuenta? ¡Inicia sesión aquí!</a></div>
            <input type="submit" value="REGISTRAR">
        </form>

    </div>
</body>
</html>