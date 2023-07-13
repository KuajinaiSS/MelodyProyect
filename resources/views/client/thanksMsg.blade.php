<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">
    <title>Gracias por su compra - Melody</title>
    @vite('resources/css/base.css')
    @vite('resources/css/thanks.css')

</head>

<body>
    <header class="header">
        <div class="headerLogo">
            <img src="{{asset('img/melodyLogo.png')}}" class="logoImg">
        </div>

        <a href="{{route('viewHome')}}" class="return">
            Volver
        </a>
    </header>

    <div class="content">
        <h1 class="title">¡Tu compra se ha realizado con éxito!</h1>

        <div class="info">
            <p class="downloadLabel">Obtén tu comprobante aquí:</p>
            <a href="{{ route('pdf.descargar', ['id' => $voucher->id]) }}">
                <button style="margin:0px" type="submit"  class="download"> DESCARGAR </button>
            </a>
        </div>

    </div>

    <footer class="pageFooter">
        <h3 class="tradeMark">Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
    </footer>
</body>




</html>
