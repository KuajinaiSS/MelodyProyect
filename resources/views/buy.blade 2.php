<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <title>Inciar sesión - Melody</title>

    @vite('resources/css/home.css')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <img src="{{asset('img/marker.png')}}" class="marker2" width="25" height="6">
    <div class="container" >

<p>Parte de arriba</p>

        <div class="containerCompra">
            <table >
                Selecciona un método de pago:
            </table>
            <table align="center">
                <td>
                    <button class="metodoPago">
                <img src="{{asset('img/efectivo.png')}}" class="pago" width="40" height="30">
                <p >Efectivo </p>
                    </button>
                </td>
                <td>
                    <button class="metodoPago">
                <img src="{{asset('img/transferencia.png')}}" class="pago" width="40" height="30">
                <p>Transferencia</p>
                    </button>
                </td>
            </table>
            <table align="center">
                <td>
                <button class="metodoPago">
                <img src="{{asset('img/credito.png')}}" class="pago" width="40" height="30">
                <p >Tarjeta de Credito</p>
                </button>
                </td>
                <td>
                <button class="metodoPago">
                <img src="{{asset('img/debito.png')}}" class="pago" width="40" height="30">
                <p >Tarjeta de Debito</p>
                </button>
                </td>
            </table>

        </div>

            <h3 >Total de compra: $XXXXX</h3>
            <button class="buttonBuy" >COMPRAR</button>


    </div>
</body>
</html>


@endsection
