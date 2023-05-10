@extends('layout.base')
@section('tituloPestana')
Crear Concierto
@endsection

@section('nombreUsuario')
itagood
@endsection

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <title>Crear concierto - Melody</title>
    @vite('resources/css/form.css')
</head>
<body>
    <div class="forms">
        <h2>¡Ingresa un concierto!</h2>
        <form action="{{route('concert')}}" method="POST" novalidate>
            @csrf
            <div class="concertName">
                <div><label>NOMBRE DEL CONCIERTO</label></div>
                <input id="concertName" name="concertName" type="text">
                @error('concertName')
                <div class="errorMsg"><p>{{ $message }}</p></div>
                @enderror
            </div>
            <div class="price">
                <div><label>PRECIO</label></div>
                <input id="price" name="price" type="text">
                @error('price')
                <div class="errorMsg"><p>{{ $message }}</p></div>
                @enderror
            </div>
            <div class="stock">
                <div><label>STOCK</label></div>
                <input id="stock" name="stock" type="text">
                @error('stock')
                <div class="errorMsg"><p>{{ $message }}</p></div>
                @enderror
            </div>
            <div class="date">
                <div><label>FECHA</label></div>
                <input id="date" name="date" type="date" onkeydown="return false">
                @error('date')
                <div class="errorMsg"><p>{{ $message }}</p></div>
                @enderror
                @if (session('message'))
                <div class="errorMsg"><p>{{session('message')}}</p></div>
                @endif
            </div>
            <input type="submit" value="CREAR CONCIERTO">
        </form>

    </div>
</body>
</html>

@endsection
