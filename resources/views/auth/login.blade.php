<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">
    <title>Gráfico de Barras</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    @vite('resources/css/form.css')
    @vite('resources/css/table.css')
    @vite('resources/css/base.css')
</head>

<body>
    <header class="header">
        <div class="headerLogo">
            <img src="{{asset('img/melodyLogo.png')}}" class="logoImg">
        </div>
        <a href="{{route('admin.concertsDetail')}}" class="return">
            Volver
        </a>
    </header>

    <div class="forms">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-labels"></script>
</head>
            <canvas id="chart3"></canvas>
            <script src="{{ asset('assets/js/graphic3.js') }}"></script>
            <script src="{{ asset('assets/js/graphic2.js') }}"></script>

        </head>






    </div>
    <footer class="pageFooter">
        <h3 class="tradeMark">Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
    </footer>
</body>
</body>

</html>
