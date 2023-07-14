<!DOCTYPE html>
<html lang="es">
    @auth
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/melodyLogo.png')}}">
    <title>@yield('tabTittle') - Melody</title>
    @vite('resources/css/base.css')
    @stack('stylesTailwind')
    @stack('chart')
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

                @if(auth()->user()->role === 1)

                <li class="link">
                    <a href="{{route('admin.concertsDetail')}}">
                        Conciertos
                    </a>
                </li>

                <li class="link">
                    <a href="{{route('concert.create')}}">
                        Crear Concierto
                    </a>
                </li>
                <li class="link">
                    <a href="{{route('collection.index')}}">
                        Recaudaciones
                    </a>
                </li>
                <li class="link">
                    <a href="{{route('users')}}">
                        Usuarios
                    </a>
                </li>
                @else
                <li class="link">
                    <a href="{{route('concerts')}}">
                        Conciertos
                    </a>
                </li>

                <li class="link">
                    <a href="{{route('client.myConcerts')}}">
                        Mis Conciertos
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


    <footer class="pageFooter">
        <h3 class="tradeMark">Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
    </footer>


</body>
@yield('alert')
@yield('script')
@endauth

@guest
<meta http-equiv="refresh" content = "0;{{route("login")}}">
@endguest
</html>