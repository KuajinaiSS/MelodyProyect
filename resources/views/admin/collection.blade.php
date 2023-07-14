@extends('layout.base')

@section('title')
    Recaudación
@endsection

@push('chart')
    <script src="https://cdn.jsdelivr.net/npm/chart.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0 "></script>
@endpush

@section('content')
    <label for="chartType">Seleccione un tipo de gráfico</label>
    <select id="chartType">
        <option value="bar-concerts">Total Vendido Por Concierto</option>
        <option value="bar-payment">Total Vendido Por Método de Pago</option>
        <option value="pie-payment">Ejemplo Gráfico Pie</option>
    </select>

    <div id="chartContainer">
        <div id="chart"  hidden>
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/js/graphics.js') }}"></script>
@endsection
