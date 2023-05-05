<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    /**
    * Aqui va el titulo de la pestaña.
    */
    ?>
    <title>Melody - @yield('tituloPestana')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&display=swap" rel="stylesheet">

    <link rel="stylesheet" href={{ asset('assets/css/base.css') }}>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src={{ asset('assets/Logo-Melody.png') }} alt="Logo de la marca">
        </div>
        <nav>
            <ul class="nav-links">
                <li ><a class="item1" href="#">Inicio</a></li>
                <li><a href="#">Conciertos</a></li>
                <li><a href="#">Extra(?</a></li>
            </ul>
        </nav>

        <a class="btn" href="#">
            <?php
            /**
            * Aqui va el nombre del usuario que inicio secion.
            */
            ?>
            <button>Bienvenido, @yield('nombreUsuario')</button>
        </a>

    </header>

    <?php
    /**
    * Aqui va el contenido principal de la pagina (main).
    */
    ?>
    @yield('contenido')


    <footer class="footer">
        <h3>Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - {{ now()->year }}. </p>

    </footer>


</body>

</html>
