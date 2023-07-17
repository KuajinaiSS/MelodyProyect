@extends('layout.base')

@section('tabTittle')
    Recaudación
@endsection


@section('content')
@auth
@vite(['resources/css/graphics.css','resources/css/tooltip.css'])
@if(auth()->user()->role === 1)
@push('chart')
    <script src="https://cdn.jsdelivr.net/npm/chart.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0 "></script>
@endpush
    <img src="{{ asset('img/marker.png') }}" class="marker" width="25" height="6">
    <div class="tooltip">
        <span class="tooltiptext">¡Selecciona un tipo de gráfico!</span>
        <select id="chartType" class="selectBar">
            <option value="bar-concerts" class="option">Total vendido por concierto</option>
            <option value="bar-payment" class="option">Total vendido por método de pago</option>
            <option value="pie-payment" class="option">Total vendido en términos de porcentaje</option>
        </select>
    </div>
    <div id="chartContainer" class="chartContainer">
        <div id='errorMsg' class="errorMsg"></div>
        <div id="chart" hidden>
            <canvas id="myChart" width="600" class="myChart" ></canvas>
        </div>
    </div>


@section('script')
    <script src="{{ asset('assets/js/graphics.js') }}"></script>
@endsection

@endsection
@elseif(auth()->user()->role === 0)
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">
@endif
@endauth


