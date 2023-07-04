@extends('layout.base')
@section('tabTittle')
Conciertos
@endsection

@section('content')

@auth
@if(auth()->user()->role === 0)


@vite('resources/css/home.css')


    <img src="{{asset('img/marker.png')}}" class="marker2" width="25" height="6">
    <div class="search">
        <form action="{{route('concert.byDate')}}" method="POST" novalidate>
            @csrf
            <input class= "byDate" id="byDate" name="byDate" type="date" onkeydown="return false">
            @error('concertName')
                <div class="errorMsg"><p>{{ $message }}</p></div>
            @enderror
            <input type="submit" value="Buscar" class="searchBtn">
        </form>
        <a href="{{route('concerts')}}" class="clearSearch">Limpiar Filtros</a>
    </div>

    @if($concerts->count() === 0)
    <h3 class="noConcerts">No hay conciertos en sistema. Intenta más tarde</h3>

    @elseif (session('notFoundMessage'))
        <div class="notFoundMsg"><p>{{session('notFoundMessage')}}</p></div>
    @elseif(session('concertByDate'))
        <div class="container">
            <div class="content">
                <img src="{{ asset('img/ticket.png') }}" width="150" height="150" align="center">
                <h2 class="concertName">{{session('concertByDate')->concertName}}</h2>
                <p class="date">{{session('concertByDate')->date}}</p>
                <p class="price">Valor: ${{number_format(session('concertByDate')->price,0,'.','.')}} CLP</p>
                <p class="stock">Entradas Disponibles: {{session('concertByDate')->availableStock}}</p>
                @if(auth()->user()->role === 0)
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
                @elseif ($concert->availableStock === 0)
                    <button class="buttonSpend" disabled>AGOTADO</button>
                @endif
            @endif

        </div>
        @endforeach
    @endif

@elseif(auth()->user()->role === 1)
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">
@endif

@endauth

@endsection
