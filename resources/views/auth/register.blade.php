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

    @vite(['resources/css/form.css', 'resources/js/app.js'])
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

                <input data-tooltip-target="tooltip-nom" data-tooltip-placement="left" id="name" name="name"
                    type="text" width="400px">
                <div id="tooltip-nom" role="tooltip"
                    class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium  transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                    El nombre debe tener al menos 3 caracteres y solo se permiten letras. ✍️✉️👤
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                @error('name')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="email">
                <div><label>CORREO ELECTRÓNICO</label></div>
                <input data-tooltip-target="tooltip-email" data-tooltip-placement="left" id="email" name="email"
                    type="text">
                <div id="tooltip-email" role="tooltip"
                    class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium  transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                    El correo electrónico debe ser único. 📧🔒🔑
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                @error('email')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="password">
                <div><label>CONTRASEÑA</label></div>
                <input data-tooltip-target="tooltip-pass" data-tooltip-placement="left" id="password" name="password"
                    type="password">
                <div id="tooltip-pass" role="tooltip"
                    class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium  transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                    La contraseña debe ser alfanumérica (letras y números) y contener al menos 8 caracteres 🔐🔢🔤
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                @error('password')
                    <div class="errorMsg">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="register"><a href="{{ route('login') }}">¿Ya tienes cuenta? ¡Inicia sesión aquí!</a></div>
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
