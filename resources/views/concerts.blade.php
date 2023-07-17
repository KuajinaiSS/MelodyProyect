@extends('layout.base')
@section('tabTittle')
    Conciertos
@endsection

@section('content')

    @auth
        @if (auth()->user()->role === 0)
            @vite('resources/css/home.css')


            <img src="{{ asset('img/marker.png') }}" class="marker2" width="25" height="6">
            <div class="search">
                <form action="{{ route('concert.byDate') }}" method="POST" novalidate>
                    @csrf
                    <input data-tooltip-target="tooltip-fecha" class="byDate" id="byDate" name="byDate" type="date"
                        onkeydown="return false">
                    <div id="tooltip-fecha" role="tooltip"
                        class="max-w-xs absolute z-10 invisible inline-block px-3 py-2 text-s font-medium text-white transition-opacity duration-300 bg-[#036c6f] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        📅 Filtra por fecha 📅
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    @error('concert_name')
                        <div class="errorMsg">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <input type="submit" value="Buscar" class="searchBtn">
                </form>
                <a href="{{ route('concerts') }}" class="clearSearch">Limpiar Filtros</a>
            </div>

            @if ($concerts->count() === 0)
                <h3 class="noConcerts">No hay conciertos en sistema. Intenta más tarde</h3>
            @elseif (session('notFoundMessage'))
                <div class="notFoundMsg">
                    <p>{{ session('notFoundMessage') }}</p>
                </div>
            @elseif(session('concertByDate'))
                <div class="container">
                    <div class="content">
                        <img src="{{ asset('img/ticket.png') }}" width="150" height="150" >
                        <h2 class="concert_name">{{ session('concertByDate')->concert_name }}</h2>
                        <p class="date">{{ session('concertByDate')->date }}</p>
                        <p class="price">Valor: ${{ number_format(session('concertByDate')->price, 0, '.', '.') }} CLP</p>
                        <p class="stock">Entradas Disponibles: {{ session('concertByDate')->available_stock }}</p>
                        @if (auth()->user()->role === 0)
                            @if (session('concertByDate')->available_stock > 0)
                                <button class="buttonBuy">COMPRAR</button>
                            @elseif(session('concertByDate')->available_stockk === 0)
                                <button class="buttonSpend" disabled>AGOTADO</button>
                            @endif
                        @endif

                    </div>
                </div>
            @elseif ($concerts->count() > 0)
                <div class="container">
                    @foreach ($concerts as $concert)
                        <div class="content">
                            <img src="{{ asset('img/ticket.png') }}" width="150" height="150" align="center">
                            <h2 class="concert_name">{{ $concert->concert_name }}</h2>
                            <p class="date">{{ $concert->date }}</p>
                            <p class="price">Valor: ${{ number_format($concert->price, 0, '.', '.') }} CLP</p>
                            <p class="stock">Entradas Disponibles: {{ $concert->available_stock }}</p>
                            @if (auth()->user()->role === 0)
                                @if ($concert->available_stockkkk > 0)
                                    <a data-tooltip-target="tooltip-comprar" data-tooltip-placement="bottom"
                                        href="{{ route('buy', ['id' => $concert->id]) }}">
                                        <button class="buttonBuy">COMPRAR</button>
                                    </a>
                                    <div id="tooltip-comprar" role="tooltip"
                                        class="max-w-xs font-sans absolute z-10 invisible inline-block px-3 py-4 text-sm font-medium text-white transition-opacity duration-300 bg-[#036c6f] rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <span id="emoji-inicio">🎤</span> Compra tus Entradas <span id="emoji-final">🎸</span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                @elseif ($concert->available_stock === 0)
                                    <button class="buttonSpend" disabled>AGOTADO</button>
                                @endif
                            @endif

                        </div>
                    @endforeach
            @endif
        @elseif(auth()->user()->role === 1)
            <meta http-equiv="refresh" content="0;{{ route('viewHome') }}">
        @endif

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
    @endauth

@endsection
