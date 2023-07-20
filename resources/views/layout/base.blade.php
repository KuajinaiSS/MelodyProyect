<!DOCTYPE html>
<html lang="es">
@auth

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ asset('img/melodyLogo.png') }}">
        <title>@yield('tabTittle') - Melody</title>
        @vite(['resources/css/base.css','resources/css/tooltip.css'])
        @stack('chart')
    </head>

    <body>
        <header class="header">
            <div class="headerLogo">
                <button id="play" class="play" onclick="reproducirAudio()"><img src="{{ asset('img/melodyLogo.png') }}" class="logoImg" id="imgClick"></button>
                <audio src="{{asset("mp3/intro.mp3")}}" id="audio" hidden></audio>

            </div>

            <nav class="nav-links">
                <ul class="linkList">
                    <li class="link">

                        <div class="tooltip">
                            <span class="tooltiptext" style="width: 210px"> Conciertos recomendados 🎧 </span>
                            <a href="{{ route('viewHome') }}">
                                Inicio
                            </a>
                        </div>
                    </li>



                    @if (auth()->user()->role === 1)
                        <li class="link">
                            <div class="tooltip">
                            <span class="tooltiptext" style="width: 230px"> Tabla de todos los conciertos 📒 </span>
                            <a href="{{ route('admin.concertsDetail') }}">
                                Conciertos
                            </a>
                            </div>
                        </li>

                        <li class="link">
                            <div class="tooltip">
                            <span class="tooltiptext"> ¡Acá puedes agregar conciertos! 🎤</span>
                            <a href="{{ route('concert.create') }}">
                                Crear Concierto
                            </a>
                            </div>
                        </li>

                        <li class="link">
                            <div class="tooltip">
                                <span class="tooltiptext"> Las recaudaciones de los conciertos 💰</span>
                                <a href="{{ route('admin.collection') }}">
                                    Recaudaciones
                                </a>
                            </div>
                        </li>

                        <li class="link">

                            <div class="tooltip">
                                <span class="tooltiptext"> ¡Acá puedes buscar un usuario! 🔍 </span>
                                <a href="{{ route('users') }}">
                                    Usuarios
                                </a>
                            </div>

                        </li>


                    @else
                        <li class="link">
                            <div class="tooltip">
                                <span class="tooltiptext"> ¡Acá puedes buscar todos los conciertos! 🔍 </span>
                            <a href="{{ route('concerts') }}">
                                Conciertos
                            </a>
                            </div>


                        </li>
                        <li class="link">
                            <div class="tooltip">
                                <span class="tooltiptext"> Revisa las entradas que has comprado 🎟️</span>
                            <a href="{{ route('client.myConcerts') }}">
                                Mis Conciertos
                            </a>
                            </div>

                        </li>
                    @endif
                </ul>
            </nav>

            <ul class="userLoggedIn">
                <li>
                    <a class="userOptions">
                        Bienvenido, {{ auth()->user()->name }}
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="verticalMenu">
                        @csrf
                        <li>
                            <input type="submit" value="Cerrar Sesión" class="logout">
                        </li>
                    </form>
                </li>

                <div class="sideMenu">
                    <label for="btnMenu" ><img src="{{ asset('img/menuImg.png') }}" class="menuImg"></label>
                    <input type="checkbox" id="btnMenu">
                    <div class="menuContainer">

                        <div class="menuContent">
                            <label for="btnMenu"><img src="{{ asset('img/close.png') }}" class="closeImg"></label>
                            <nav>
                                <p class="userOptions">

                                    Bienvenido,
                                    <br>
                                    {{ auth()->user()->name }}

                                </p>
                                <a href="{{ route('viewHome') }}">
                                    ●  Inicio
                                </a>

                                @if (auth()->user()->role === 1)

                                    <a href="{{ route('admin.concertsDetail') }}">
                                        ● Conciertos
                                    </a>

                                    <a href="{{ route('concert.create') }}">
                                        ● Crear Concierto
                                    </a>

                                    <a href="{{ route('admin.collection') }}">
                                        ● Recaudaciones
                                    </a>

                                    <a href="{{ route('users') }}">
                                        ● Usuarios
                                    </a>

                                @else

                                    <a href="{{ route('concerts') }}">
                                        ● Conciertos
                                    </a>

                                    <a href="{{ route('client.myConcerts') }}">
                                        ● Mis Conciertos
                                    </a>

                                @endif
                                <a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <input type="submit" value="● Cerrar Sesión" class="logout">
                                    </form>
                                </a>
                            </nav>
                        </div>

                    </div>

                </div>
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


        <footer class="pageFooter">
            <h3 class="tradeMark">Melody™</h3>
            <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
        </footer>


    </body>

    <script>
        var audio = document.getElementById("audio");

        function reproducirAudio() {
          audio.play();
        }

      </script>

    @yield('alert')
    @yield('script')
@endauth

@guest
    <meta http-equiv="refresh" content="0;{{ route('login') }}">
@endguest

</html>
