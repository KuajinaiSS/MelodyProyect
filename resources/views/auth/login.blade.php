<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">
    <title>Inciar sesión - Melody</title>

    @vite('resources/css/form.css')
</head>

<body>
    <div class="forms">
        <div class="logo">
            <img src="{{ asset('img/MelodyLogo.png') }}" class="img" width="45" height="45">
            <h1 class="logoNombre">Melody</h1>
        </div>
        <p>¡Inicia sesión!</p>
        <form action="{{ route('login') }}" method="POST" novalidate>
            @csrf
            @if (session('message'))
                <div class="errorMsg">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <div class="name">
                <div><label>CORREO ELECTRÓNICO</label></div>
                <input id="email" name="email" type="text">
                @error('email')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="password">
                <div><label>CONTRASEÑA</label></div>
                <input id="password" name="password" type="password">
                @error('password')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="register"><a href="{{ route('register') }}">¿No tienes cuenta? ¡Regístrate aquí!</a></div>
            <input type="submit" value="INGRESAR" class="store">
        </form>

    </div>
</body>

</html>
