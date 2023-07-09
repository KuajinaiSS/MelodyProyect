<!DOCTYPE html>
<html lang="es">
@auth

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ asset('img/melodyLogo.png') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>
        <title>@yield('tabTittle') - Melody</title>
        @vite(['resources/js/app.js', 'resources/css/base.css'])
        @stack('stylesTailwind')
    </head>

    <body>
        <header class="header">
            <div class="headerLogo">
                <img src="{{ asset('img/melodyLogo.png') }}" class="logoImg">
            </div>

            <nav class="nav-links">
                <ul class="linkList">
                    <li class="link">
                        <a data-tooltip-target="tooltip-default" href="{{ route('viewHome') }}">
                            Inicio
                        </a>

                        <div id="tooltip-default" role="tooltip"
                            class=" max-w-xsabsolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            🎵 Conciertos Recomendados
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                    </li>

                    @if (auth()->user()->role === 1)
                        <li class="link">
                            <a data-tooltip-target="tooltip-conciertos" href="{{ route('admin.concertsDetail') }}">
                                Conciertos
                            </a>
                            <div id="tooltip-conciertos" role="tooltip"
                                class=" max-w-xsabsolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Tabla de todos los conciertos vendidos
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                        </li>

                        <li class="link">
                            <a data-tooltip-target="tooltip-crear-concierto" href="{{ route('concert.create') }}">
                                Crear Concierto
                            </a>
                            <div id="tooltip-crear-concierto" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Aca podemos agregar conciertos! wow
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>
                    @else
                        <li class="link">
                            <a data-tooltip-target="tooltip-conciertos" href="{{ route('concerts') }}">
                                Conciertos
                            </a>
                            <div id="tooltip-conciertos" role="tooltip"
                                class=" max-w-xsabsolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                ✔️ Compra tus boletos aqui
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>
                    @endif
                </ul>
            </nav>

            <ul class="userLoggedIn">
                <li>
                    <a href="#options" class="userOptions">
                        Bienvenido, {{ auth()->user()->name }}
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="verticalMenu">
                        @csrf
                <li><input type="submit" value="Cerrar Sesión" class="logout"></li>
                </form>
                </li>
            </ul>
            <img src="{{ asset('img/userLoggedIn.png') }}" class="loggedInImg">
        </header>


        <main>

            <?php
            /**
             * Aqui va el contenido principal de la pagina (main).
             */
            ?>
            @yield('content')

        </main>


        <footer class="footer">
            <h3 class="tradeMark">Melody™</h3>
            <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
        </footer>


    </body>
    @yield('alert')

@endauth

@guest
    <meta http-equiv="refresh" content="0;{{ route('login') }}">
@endguest

</html>
