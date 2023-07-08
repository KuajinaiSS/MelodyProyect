@extends('layout.base')
@section('tabTittle')
Inicio
@endsection

@section('content')

@auth

@vite('resources/css/home.css')

    <img src="{{asset('img/marker.png')}}" class="marker" width="25" height="6">
    @if($concerts->count() === 0)
        <h3 class="noConcerts">No hay conciertos en sistema. Intenta más tarde</h3>
    @elseif ($concerts->count() > 0)
        <section>
            <h1 class="recomended"> Recomendados </h1>
        </section>
        <div class="container">
            @foreach ($concerts as $concert)
            <div class="content">
                <img src="{{ asset('img/ticket.png') }}" width="150" height="150" align="center">
                <h2 class="concertName">{{$concert->concertName}}</h2>
                <p class="date">{{$concert->date}}</p>
                <p class="price">Valor: ${{number_format($concert->price,0,'.','.')}} CLP</p>
                <p class="stock">Entradas Disponibles: {{$concert->availableStock}}</p>
                @if(auth()->user()->role === 0)
                    @if ($concert->availableStock > 0)
                        <a href="{{route('buy',['id' => $concert->id])}}">
                        <button class="buttonBuy">COMPRAR</button>
                        </a>
                    @endif
                    @if ($concert->availableStock === 0)
                        <button class="buttonSpend" disabled>AGOTADO</button>
                    @endif
                @endif

            </div>
            @endforeach
        </div>
    @endif
@endauth
@endsection