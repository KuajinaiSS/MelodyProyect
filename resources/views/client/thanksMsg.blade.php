<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/MelodyLogo.png') }}">

    <title>Gracias por su compra - Melody</title>

    @vite('resources/css/form.css')
</head>

<body>
    <div class="forms">
        <div class="logo">
            <img src="{{ asset('img/MelodyLogo.png') }}" class="img" width="45" height="45">
            <h1 class="logoNombre">Melody</h1>
        </div>
        <p>¡Muchas gracias por su compra!</p>

        <div>

            <p style="font-size: 20px">Tu compra se ha completado con éxito.</p>
            <br>
            <p >Obtener Boleta</p>
            <a href="{{ route('pdf.descargar', ['id' => $voucher->id]) }}">
                <button style="margin:0px" type="submit" value="DESCARGAR" class="store">Descargar </button>
            </a>
            <br>
            <p>
                <a href="{{ route('viewHome') }}">Volver a la pagina de inicio</a>
            </p>

        </div>


    </div>
</body>

</html>
