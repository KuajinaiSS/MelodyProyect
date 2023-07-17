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
        @stack('chart')
        <style>
            .emoji {
                position: absolute;
                font-size: 30px;
                animation: float 1s ease-in-out infinite;
            }

            @keyframes float {
                0% {
                    transform: translate3d(0, 0, 0);
                }

                50% {
                    transform: translate3d(0, -20px, 0);
                }

                100% {
                    transform: translate3d(0, 0, 0);
                }
            }
        </style>
    </head>

    <body>
        <header class="header">
            <div class="headerLogo">
                <img src="{{ asset('img/melodyLogo.png') }}" class="logoImg">
            </div>

            <nav class="nav-links">
                <ul class="linkList">
                    <li class="link">
                        <a data-tooltip-target="tooltip-inicio" href="{{ route('viewHome') }}">
                            Inicio
                        </a>
                        <div id="tooltip-inicio" role="tooltip"
                            class=" max-w-xsabsolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            🎧 Conciertos Recomendados 🎧
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

                        </li>
                        <li>
                            <a href="{{ route('admin.collection') }}">
                                Recaudaciones
                            </a>
                        </li>
                        <li>
                            {{-- class="absolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        📝 Aca podemos agregar conciertos! wow --}}
                            <div id="tooltip-conciertos" role="tooltip"
                                class=" max-w-xsabsolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Tabla de todos los conciertos vendidos
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
                                ✔️ Compra tus boletos aquí
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>
                        <li class="link">
                            <a data-tooltip-target="tooltip-mis-conciertos" href="{{ route('client.myConcerts') }}">
                                Mis Conciertos
                            </a>
                            <div id="tooltip-mis-conciertos" role="tooltip"
                                class=" max-w-xsabsolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Revisa tus conciertos
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

        <script>
            var audio = new Audio('/songs/egg2.mp3');
            var isPlaying = false;
            var maxTime = 4; // Tiempo máximo de reproducción en segundos
            var intervalId;
            var emojis = ["🎉", "🎊", "🌟", "🎈"];

            function playSong() {
                if (!isPlaying) {
                    audio.play();
                    isPlaying = true;
                    emojiExplosion();

                }
            }

            function emojiExplosion() {
                for (let i = 0; i < 20; i++) {
                    setTimeout(() => {
                        let emoji = document.createElement('div');
                        emoji.classList.add('emoji');
                        emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
                        emoji.style.left = Math.random() * window.innerWidth + 'px';
                        emoji.style.top = Math.random() * window.innerHeight + 'px';
                        document.body.appendChild(emoji);

                        setTimeout(() => {
                            emoji.remove();
                            isPlaying = false;
                        }, 2000);
                    }, i * 100);
                }
            }
        </script>

        <footer class="pageFooter">
            {{-- <p id="currentTime">Current Time: 0 seconds</p> --}}
            <h3 onmouseenter="playSong()" data-tooltip-target="tooltip-egg" class="tradeMark" style="margin-right: 90%">
                Melody™
            </h3>
            <div id="tooltip-egg" role="tooltip"
                class="max-w-xs absolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-[#036c6f] rounded-lg shadow-sm opacity-0 tooltip">
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <p class="copyright text-white"> Todos los derechos reservados - 2023. </p>
        </footer>


    </body>
    @yield('alert')
    @yield('script')
@endauth

@guest
    <meta http-equiv="refresh" content="0;{{ route('login') }}">
@endguest



</html>
