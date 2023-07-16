<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Crear cuenta - Melody</title>

    @vite(['resources/css/form.css','resources/css/tooltip.css'])
</head>

<body>
    <div class="forms">
        <div class="logo">
            <img src="{{ asset('img/MelodyLogo.png') }}" class="img" width="45" height="45">
            <h1 class="logoNombre">Melody</h1>
        </div>
        <p>¡Crea tu cuenta!</p>
        <form id="form" action="{{ route('register') }}" method="POST" novalidate>
            @csrf
            <div class="name">
                <div><label>NOMBRE</label></div>
                <div class="tooltipIzq">
                    <span class="tooltiptext"> Recuerda que el nombre debe tener como mínimo 3 caracteres, los cuales deben ser solo letras
                        <br>
                        (づ ᴗ _ᴗ)づ♡
                     </span>
                <input id="name" name="name"
                    type="text" width="400px">
                </div>
                @error('name')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="email">
                <div><label>CORREO ELECTRÓNICO</label></div>
                <div class="tooltipIzq">
                    <span class="tooltiptext"> Recuerda que el correo electrónico debe ser único y debe estar en su correcto formato
                        <br>
                        ⸜(｡˃ ᵕ ˂ )⸝♡
                     </span>
                <input id="email" name="email"
                    type="text">
                </div>
                @error('email')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="password">
                <div><label>CONTRASEÑA</label></div>
                <div class="tooltipIzq">
                    <span class="tooltiptext"> Recuerda que la contraseña debe contener solo letras y al menos un numero, además debe tener como mínimo 8 caracteres
                        <br>
                        (˶ᵔ ᵕ ᵔ˶ )
                     </span>
                <input id="password" name="password"
                    type="password">
                </div>
                @error('password')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="register"><a href="{{ route('login') }}">¿Ya tienes cuenta? ¡Inicia sesión aquí!</a></div>
            <div class="tooltip" style="width: 400px">
                <span class="tooltiptext" style="margin-top: -50px"> ¡Presiona el botón para registrar tu cuenta! </span>
            <input id="button" type="button" value="REGISTRAR" class="store">
            </div>
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
            confirmButtonText: 'ACEPTAR',
            cancelButtonText: 'CANCELAR',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            customClass: {
                container: 'alert',
                popup: 'popupMessage',
                confirmButton: 'button',
                cancelButton: 'button',
                input: 'input'
            }
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
            }
        })
    })
</script>



</html>
