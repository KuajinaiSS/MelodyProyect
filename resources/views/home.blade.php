@extends('layout.base')
@section('tabTittle')
    Inicio
@endsection

@section('content')
    @auth


        <!DOCTYPE html>
        <html lang="en">
        @vite('resources/css/home.css')

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Inicio</title>

        </head>

        <body>
            <img src="{{ asset('img/marker.png') }}" class="marker" width="25" height="6">
            <section>
                <h1 class="recomended"> Recomendados </h1>
            </section>

            </div>
            @if ($concerts->count() === 0)
                <h3 class="noConcerts">No hay conciertos en sistema. Intenta más tarde</h3>
            @endif

            @if ($concerts->count() > 0)
                <div class="container">
                    @foreach ($concerts as $concert)
                        <div class="content">
                            <img src="{{ asset('img/ticket.png') }}" alt="Concierto" width="150"
                                height="150" align="center">
                            <h2 class="concert_name">{{ $concert->concert_name }}</h2>
                            <p class="date">{{ $concert->date }}</p>
                            <p class="price">Valor: ${{ $concert->price }} CLP</p>
                            <p class="stock">Entradas Disponibles: {{ $concert->available_stock }}</p>
                            @if (auth()->user()->role === 0)
                                @if ($concert->available_stock > 0)
                                    <a data-tooltip-target="tooltip-comprar" data-tooltip-placement="bottom"
                                        href="{{ route('buy', ['id' => $concert->id]) }}">
                                        <button class="buttonBuy">COMPRAR</button>
                                    </a>
                                    <div id="tooltip-comprar" role="tooltip"
                                        class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#036c6f] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <span id="emoji-inicio">🎤</span> Compra tus Entradas <span id="emoji-final">🎸</span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                @endif
                                @if ($concert->available_stock === 0)
                                    <button class="buttonSpend" disabled>AGOTADO</button>
                                @endif
                            @endif

                        </div>
                    @endforeach
            @endif

            </div>
            <script>
                const emojisInicio = ['🎤', '🎸', '🎹', '🥁', '🎶']; // Lista predefinida de emojis para el inicio
                const emojisFinal = ['💰', '🎉', '🎊', '🎁', '🔥']; // Lista predefinida de emojis para el final
                const emojiInicio = document.getElementById('emoji-inicio');
                const emojiFinal = document.getElementById('emoji-final');

                let currentIndexInicio = 0;
                let currentIndexFinal = 0;

                setInterval(() => {
                    emojiInicio.textContent = emojisInicio[currentIndexInicio];
                    emojiFinal.textContent = emojisFinal[currentIndexFinal];

                    currentIndexInicio++;
                    currentIndexFinal++;

                    if (currentIndexInicio >= emojisInicio.length) {
                        currentIndexInicio = 0;
                    }

                    if (currentIndexFinal >= emojisFinal.length) {
                        currentIndexFinal = 0;
                    }
                }, 1000); // Cambia los emojis cada 1 segundo (ajusta el tiempo según tus necesidades)
            </script>

        </html>
    @endauth
@endsection
