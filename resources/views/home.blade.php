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
                                height="150">
                            <h2 class="concert_name">{{ $concert->concert_name }}</h2>
                            <p class="date">{{ $concert->date }}</p>
                            <p class="price">Valor: ${{ number_format($concert->price, 0, '.', '.') }} CLP</p>
                            <p class="stock">Entradas Disponibles: {{ $concert->available_stock }}</p>
                            @if (auth()->user()->role === 0)
                                @if ($concert->available_stock > 0)
                                <div class="tooltip">
                                    <span class="tooltiptext" style="font-size: 18px"> Compra entradas para este concierto 🎧 </span>
                                    <a href="{{ route('buy', ['id' => $concert->id]) }}">
                                        <button class="buttonBuy">COMPRAR</button>
                                    </a>
                                </div>
                                @endif
                                @if ($concert->available_stock === 0)
                                <div class="tooltip">
                                    <span class="tooltiptext" style="font-size: 18px"> Entradas agotadas 😔</span>
                                    <button class="buttonSpend" disabled>AGOTADO</button>
                                </div>
                                @endif
                            @endif

                        </div>
                    @endforeach
            @endif

            </div>


        </html>
    @endauth
@endsection
