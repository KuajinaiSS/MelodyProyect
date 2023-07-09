@extends('layout.base')
@section('tabTittle')
    Conciertos
@endsection

@section('content')

    @auth
        @if (auth()->user()->role === 0)
            <!DOCTYPE html>
            <html lang="en">
            @vite('resources/css/home.css')

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
            </head>

            <body>
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
                        @error('concertName')
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
                            <img src="{{ asset('img/ticket.png') }}" alt="Concierto" width="150"
                                height="150" align="center">
                            <h2 class="concertName">{{ session('concertByDate')->concertName }}</h2>
                            <p class="date">{{ session('concertByDate')->date }}</p>
                            <p class="price">Valor: ${{ session('concertByDate')->price }} CLP</p>
                            <p class="stock">Entradas Disponibles: {{ session('concertByDate')->availableStock }}</p>
                            @if (auth()->user()->role === 0)
                                @if (session('concertByDate')->availableStock > 0)
                                    <button class="buttonBuy">COMPRAR</button>
                                @elseif(session('concertByDate')->availableStock === 0)
                                    <button class="buttonSpend" disabled>AGOTADO</button>
                                @endif
                            @endif

                        </div>
                    </div>
                @elseif ($concerts->count() > 0)
                    <div class="container">
                        @foreach ($concerts as $concert)
                            <div class="content">
                                <img src="{{ asset('img/ticket.png') }}" alt="Concierto" width="150"
                                    height="150" align="center">
                                <h2 class="concertName">{{ $concert->concertName }}</h2>
                                <p class="date">{{ $concert->date }}</p>
                                <p class="price">Valor: ${{ $concert->price }} CLP</p>
                                <p class="stock">Entradas Disponibles: {{ $concert->availableStock }}</p>
                                @if (auth()->user()->role === 0)
                                    @if ($concert->availableStock > 0)
                                        <a href="{{ route('buy', ['id' => $concert->id]) }}">
                                            <button class="buttonBuy">COMPRAR</button>
                                        </a>
                                    @elseif ($concert->availableStock === 0)
                                        <button class="buttonSpend" disabled>AGOTADO</button>
                                    @endif
                                @endif

                            </div>
                        @endforeach
                @endif

            </html>
        @elseif(auth()->user()->role === 1)
            <meta http-equiv="refresh" content="0;{{ route('viewHome') }}">
        @endif

    @endauth

@endsection
