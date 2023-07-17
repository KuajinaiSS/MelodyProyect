@auth
@if (auth()->user()->role === 0)
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">
    <title>Gracias por su compra - Melody</title>
    @vite(['resources/css/base.css','resources/css/thanks.css','resources/css/tooltip.css'])


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
            <div class="tooltip">
                <span class="tooltiptext"> ¡Presiona el botón para descargar el comprobante de tu compra!🧾 </span>
            <a href="{{ route('pdf.descargar', ['id' => $voucher->id]) }}">
                <button style="margin:0px" type="submit"  class="download"> Comprobante </button>
            </a>
            </div>
        </div>

    </div>

    <footer class="pageFooter">
        <h3 class="tradeMark">Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
    </footer>
</body>
</html>

@elseif(auth()->user()->role === 0)
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">

@endif
@endauth

@guest
    <meta http-equiv="refresh" content="0;{{ route('viewHome') }}">
@endguest
