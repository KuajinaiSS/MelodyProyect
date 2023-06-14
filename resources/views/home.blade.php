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
    <img src="{{asset('img/marker.png')}}" class="marker" width="25" height="6">
    <section>
        <h1 class="recomended"> Recomendados </h1>
    </section>

    </div>
    @if($concerts->count() === 0)
        <h3 class="noConcerts">No hay conciertos disponibles</h3>
    @endif

    @if ($concerts->count() > 0)
        <div class="container">
        @foreach ($concerts as $concert)
        <div class="content">
            <img src="{{ asset('img/ticket.png') }}" alt="Concierto" width="150" height="150" align="center">
            <h2 class="concertName">{{$concert->concertName}}</h2>
            <p class="date">{{$concert->date}}</p>
            <p class="price">Valor: ${{$concert->price}} CLP</p>
            <p class="stock">Entradas Disponibles: {{$concert->stock}}</p>
            @if(auth()->user()->rol === 0)
                @if ($concert->stock > 0)
                    <a href="{{route('buy',['id' => $concert->id])}}">
                    <button class="buttonBuy">COMPRAR</button>
                    </a>
                @endif
                @if ($concert->stock === 0)
                    <button class="buttonSpend" disabled>AGOTADO</button>
                @endif
            @endif

        </div>
        @endforeach
    @endif

    </div>
</html>
@endauth

@endsection
