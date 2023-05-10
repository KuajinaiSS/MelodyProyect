<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/Logo-Melody.png')}}">

    <?php
    /**
     * Aqui va el titulo de la pestaña.
     */
    ?>
    <title>Melody - @yield('tituloPestana')</title>

    @vite('resources/css/base.css')
</head>

<body>
    <header class="header">

        <div class="logo">
            <img src={{ asset('img/Logo-Melody.png') }} alt="Logo de la marca">
        </div>

        <nav class="nav-links">
            <ul>
                <li><a href="{{ route('viewHome') }}">Inicio</a></li>
                <li><a href="#">Conciertos</a></li>
                <li><a href="{{ route('concert.create')}}">test register</a></li>
            </ul>
        </nav>


        <div class="usuario">
            <a href="#">
                <?php
                /**
                 * Aqui va el nombre del usuario que inicio seccion.
                 */
                ?>
                Bienvenido, @yield('nombreUsuario')
            </a>
            <img src={{ asset('img/user.png') }} alt="xd">
        </div>



    </header>


    <main>

        <?php
        /**
         * Aqui va el contenido principal de la pagina (main).
         */
        ?>
        @yield('contenido')

    </main>



    <footer class="footer">
        <h3 class="tradeMark">Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
    </footer>


</body>

</html>
