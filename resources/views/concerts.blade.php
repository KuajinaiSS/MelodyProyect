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
                    <div class="tooltip">
                        <span class="tooltiptext" style="margin-top:-20px"> Busca un concierto por su fecha 🔍</span>
                    <input class="byDate" id="byDate" name="byDate" type="date" onkeydown="return false">
                    </div>
                    @error('concertName')
                        <div class="errorMsg">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="tooltip">
                        <span class="tooltiptext" style="margin-top:-20px"> ¡Presiona el botón para buscar!</span>
                    <input type="submit" value="Buscar" class="searchBtn">
                    </div>
                </form>
                <div class="tooltip">
                    <span class="tooltiptext" style="margin-top:-20px"> Limpia la busqueda para ingresar una nueva 🧹 </span>
                    <a href="{{ route('concerts') }}" class="clearSearch" style="display: block">Limpiar Filtros</a>
                </div>
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
                        <h2 class="concertName">{{ session('concertByDate')->concertName }}</h2>
                        <p class="date">{{ session('concertByDate')->date }}</p>
                        <p class="price">Valor: ${{ number_format(session('concertByDate')->price, 0, '.', '.') }} CLP</p>
                        <p class="stock">Entradas Disponibles: {{ session('concertByDate')->availableStock }}</p>
                        @if (auth()->user()->role === 0)
                            @if (session('concertByDate')->availableStock > 0)
                            <div class="tooltip">
                                <span class="tooltiptext" style="font-size: 18px"> Compra entradas para este concierto 🎧 </span>
                                <a href="{{ route('buy', ['id' => session('concertByDate')->id]) }}">
                                    <button class="buttonBuy">COMPRAR</button>
                                </a>
                            </div>
                            @elseif(session('concertByDate')->availableStock === 0)
                            <div class="tooltip">
                                <span class="tooltiptext" style="font-size: 18px"> Entradas agotadas 😔</span>
                                <button class="buttonSpend" disabled>AGOTADO</button>
                            </div>
                            @endif
                        @endif

                    </div>
                </div>
            @elseif ($concerts->count() > 0)
                <div class="container">
                    @foreach ($concerts as $concert)
                        <div class="content">
                            <img src="{{ asset('img/ticket.png') }}" width="150" height="150" >
                            <h2 class="concertName">{{ $concert->concertName }}</h2>
                            <p class="date">{{ $concert->date }}</p>
                            <p class="price">Valor: ${{ number_format($concert->price, 0, '.', '.') }} CLP</p>
                            <p class="stock">Entradas Disponibles: {{ $concert->availableStock }}</p>
                            @if (auth()->user()->role === 0)
                                @if ($concert->availableStock > 0)
                                <div class="tooltip">
                                    <span class="tooltiptext" style="font-size: 18px"> Compra entradas para este concierto 🎧 </span>
                                    <a href="{{ route('buy', ['id' => $concert->id]) }}">
                                        <button class="buttonBuy">COMPRAR</button>
                                    </a>
                                </div>
                                @elseif ($concert->availableStock === 0)
                                <div class="tooltip">
                                    <span class="tooltiptext" style="font-size: 18px"> Entradas agotadas 😔</span>
                                    <button class="buttonSpend" disabled>AGOTADO</button>
                                </div>
                                @endif
                            @endif

                        </div>
                    @endforeach
            @endif
        @elseif(auth()->user()->role === 1)
            <meta http-equiv="refresh" content="0;{{ route('viewHome') }}">
        @endif
    @endauth

@endsection
