<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Crear cuenta - Melody</title>

    @vite('resources/css/form.css')
</head>
<body>
    <div class="forms">
        <div class="logo">
            <img src="{{asset('img/MelodyLogo.png')}}" class ="img" width="45" height="45">
            <h1 class="logoNombre">Melody</h1>
        </div>
        <p>¡Crea tu cuenta!</p>
        <form id="form" action="{{route('register')}}" method="POST" novalidate>
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
            <input id="button" type="button" value="REGISTRAR" class="store">
        </form>

    </div>
</body>

<script>
    // Aqui va nuestro script de sweetalert
    const button = document.getElementById("button");
    const form = document.getElementById("form");

    button.addEventListener('click', (e) => {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro que quieres enviar estos datos?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00c787',
            cancelButtonColor: '#FF5C77',
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
            }
        })
    })
</script>



</html>
