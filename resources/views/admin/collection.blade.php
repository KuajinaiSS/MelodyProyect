<!DOCTYPE html>
<html lang="es">
@extends('layout.base')
@section('tabTittle')
    Usuarios
@endsection


@section('content')
@auth
@vite('resources/css/table.css')
@if(auth()->user()->role === 1)

        <img src="{{asset('img/marker.png')}}" class="marker2" width="25" height="6">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">
        <title>Recaudacion</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js-plugin-datalabels@2.0.0 "></script>
        @vite('resources/css/form.css')
        @vite('resources/css/base.css')
        @vite('resources/css/buy.css')
        <script src="{{ asset('assets/js/graphics.js') }}"></script>
    </head>

    <label for="chartType"> Seleccione un tipo de grafico </label>
    <select id="chartType"  class="menu3" onchange="loadChart()">
        <option value="bar-concerts">Total vendido por Concierto</option>
        <option value="bar-payment">Total vendido por método de pago</option>
        <option value="pie-payment">Total vendido por Porcentaje</option>
    </select>
    <br><br>
    <div id="chartContainer">
        <div id="chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>

@elseif(auth()->user()->role === 0)
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">
@endif
@endauth
@endsection
