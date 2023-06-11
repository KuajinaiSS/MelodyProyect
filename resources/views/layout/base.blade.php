<!DOCTYPE html>
<html lang="es">
    @auth
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/melodyLogo.png')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>@yield('tabTittle') - Melody</title>
    @vite('resources/css/base.css')
    @stack('stylesTailwind')
</head>

<body>
    <header class="header">
        <div class="headerLogo">
            <img src="{{asset('img/melodyLogo.png')}}" class="logoImg">
        </div>

        <nav class="nav-links">
            <ul class="linkList">
                <li class="link">
                    <a href="{{route('viewHome')}}">
                        Inicio
                    </a>

                </li>
                <li class="link">
                    <a href="{{route('concerts')}}">
                        Conciertos
                    </a>
                </li>


                <li class="link">
                    <a href="{{route('client.myConcerts')}}">
                        AUX
                    </a>
                </li>




                @if(auth()->user()->rol === 1)
                <li class="link">
                    <a href="{{route('concert.create')}}">
                        Crear Concierto
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <ul class="userLoggedIn">
            <li>
                <a href="#options" class="userOptions">
                    Bienvenido, {{ auth()->user()->name }}
                </a>
                <form action="{{route('logout')}}" method="POST" class="verticalMenu" >
                    @csrf
                    <li><input type="submit" value="Cerrar Sesión" class="logout"></li>
                </form>
            </li>
        </ul>
        <img src="{{asset('img/userLoggedIn.png')}}" class="loggedInImg">
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
@endauth

@guest
<meta http-equiv="refresh" content = "0;{{route("login")}}">
@endguest
</html>
