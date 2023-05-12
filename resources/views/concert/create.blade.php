@extends('layout.base')
@section('tabTittle')
Crear Concierto
@endsection


@section('content')

@auth


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    @vite('resources/css/form.css')
</head>
@if(auth()->user()->rol === 1)
<body>
    <img src="{{asset('img/marker.png')}}" class="marker" width="30" height="6">
    <div class="concertForms">
        <h2>¡Ingresa un concierto!</h2>
        <form id="form" action="{{route('concert')}}" method="POST" novalidate>
            @csrf
            @if (session('confirmMessage'))
                <div class="confirmMsg"><p>{{session('confirmMessage')}}</p></div>
            @endif
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
            <input  id="button" type="button" value="CREAR CONCIERTO" class="store">
        </form>

    </div>
</body>

<script>
    // Aqui va nuestro script de sweetalert
    const button = document.getElementById("button");
    const form = document.getElementById("form");

    button.addEventListener('click', (e) => {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro que quieres enviar estos datos?',
            icon: 'warning',
            position: 'center',
            backdrop: true,
            toast: false,
            showCancelButton: true,
            confirmButtonColor: '#00c787',
            cancelButtonColor: '#FF5C77',
            confirmButtonText: 'ENVIAR',
            cancelButtonText: 'CANCELAR',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            customClass:{
                container: 'alert',
                popup: 'popupMessage',
                confirmButton: 'button',
                cancelButton: 'button',
                input: 'input'
            }
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
            }
        })
    })
</script>

@endif
@if(auth()->user()->rol === 0)
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">
@endif
</html>
@endauth
@endsection
