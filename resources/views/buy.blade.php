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


    <div class="containerCompraGen">
        <h1>¡Compra tus entradas!</h1>
        <table>
            <td>
                <h2>Nombre del Concierto:</h2>
                <p2>Concierto Ejemplo</p2>
                <h2>Fecha:</h2>
                <p2>XX/XX/XX</p2>
                <h2>Valor de entrada:</h2>
                <p2>$XX.XXX</p2>
                <h2>Cantidad de entradas:</h2>
                <select name="menu2">

                    {{-- <option selected value="">--Seleccione las entradas--</option>
                    @for ($i = 1; $i <= $concert->stock; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>

                    @endfor --}}

                /select>
            </td>
            <td>
                <img src="{{asset('img/tickethd.png')}}" class="pago" width="190" height="190" >
            </td>

        </table>

        <div class = "container"> </div>
        <div class="containerCompra">
            <table>
                Seleccione su metodo de pago
            </table>
            <table align="center">
                <td>
                    <button class="metodoPago">
                <img src="{{asset('img/efectivo.png')}}" class="pago" width="30" height="30">
                <p>Efectivo</p>
                    </button>
                </td>
                <td>
                    <button class="metodoPago">
                <img src="{{asset('img/transferencia.png')}}" class="pago" width="30" height="30">
                <p>Transferencia</p>
                    </button>
                </td>
            </table>
            <table align="center">
                <td>
                <button class="metodoPago">
                <img src="{{asset('img/tarjetaCredito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Credito</p>
                </button>
                </td>
                <td>
                <button class="metodoPago">
                <img src="{{asset('img/tarjetaDebito.png')}}" class="pago" width="30" height="30">
                <p >Tarjeta de Debito</p>
                </button>
                </td>
            </table>
        </div>

            <h3>TOTAL: $XX.XXX</h3>
            <button class="buttonBuy" >COMPRAR</button>

    </div>


</body>
</html>
