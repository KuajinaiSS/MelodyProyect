@extends('layout.base')
@section('tituloPestana')
    crear concierto
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
        <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">
        <title>Crear cuenta - Melody</title>
        <link href="{{ asset('css/test.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="formulario">
            <form action="" method="POST" novalidate>
                <p>¡Ingresa un concierto!</p>
                @csrf
                <div class="name">
                    <div><label>NOMBRE DEL CONCIERTO</label></div>
                    <input id="name" name="name" type="text">
                </div>
                <div class="price">
                    <div><label>PRECIO</label></div>
                    <input id="price" name="price" type="text">
                </div>
                <div class="stock">
                    <div><label>STOCK</label></div>
                    <input id="stock" name="stock" type="text">
                </div>
                <div class="date">
                    <div><label>FECHA</label></div>
                    <input id="date" name="date" type="date">
                </div>
                <input type="submit" value="CREAR CONCIERTO">
            </form>

        </div>
    </body>

    </html>
@endsection
