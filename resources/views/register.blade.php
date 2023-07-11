<link href="{{ asset('assets/styles.css') }}" rel="stylesheet" type="text/css">

@extends('layout.base')
<form action="action_page.php">

    <body>
        <div class="container">

            <h1> <img src="assets/Logo-Melody.png" alt="Melody" width="60" height="60" align="center"> Melody</h1>
            <p align=center>¡Crea tu cuenta!</p>


            <label data-tooltip-target="tooltip-nom" data-tooltip-placement="left" for="email"><b>NOMBRE DE
                    USUARIO</b></label>
            <input type="text" placeholder=" " name="usuario" id="email" required>
            <div id="tooltip-nom" role="tooltip"
                class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                El nombre debe tener al menos 3 caracteres y solo se permiten letras. ✍️✉️👤
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <label for="email"><b>CORREO ELECTRÓNICO</b></label>
            <input data-tooltip-target="tooltip-email" data-tooltip-placement="left" type="text" placeholder=" "
                name="email" id="email" required>
            <div id="tooltip-email" role="tooltip"
                class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                El correo electrónico debe ser único. 📧🔒🔑
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <label for="psw"><b>CONTRASEÑA</b></label>
            <input data-tooltip-target="tooltip-pass" data-tooltip-placement="left" type="password" placeholder=" "
                name="psw" id="psw" required>
            <div id="tooltip-pass" role="tooltip"
                class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#a5decd] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-black">
                - La contraseña debe ser alfanumérica (letras y números). 🔐🔢🔤
                - La contraseña debe tener al menos 8 caracteres. 🔐🔢🔤🔠
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <button type="submit" class="registerbtn">REGISTRAR</button>
        </div>

        <div class="container signin">
            <p>¿Ya tienes una cuenta? <a href="#">¡Inicia sesión aquí!</a>.</p>
        </div>

    </body>
    <footer>
        <p> Melody. Derechos reservados 2023</p>
    </footer>
</form>
