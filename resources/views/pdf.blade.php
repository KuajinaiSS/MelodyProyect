<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $detail_order->reservation_number . '-' . $detail_order->concertDates->date }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');

        body {
            padding: 10px;
        }

        .title {
            font-weight: bold;
            text-align: center;
        }

        h2 {
            color: #017AEB;
        }

        h3 {
            font-weight: bold;

        }

        p {
            font-weight: bold;
        }

        span {
            font-weight: 700;


        }

        .total {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .total-pay {
            margin-bottom: 0px;
            text-align: center;
        }

        .method-pay {
            color: #a9a9a9;
            font-weight: bold;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class=" title">Comprobante de Entradas: {{ $detail_order->reservation_number }}</h1>
    <div>
        <h3>Productora Melody</h3>
        <h3>Fecha:
            <span>{{ $date }}</span>
        </h3>
    </div>
    <div>
        <h2>Datos del concierto</h2>
        <p>Reserva de número:
            <span>{{ $detail_order->reservation_number }}</span>
        </p>
        <p>Concierto:
            <span>{{ $detail_order->concertDates->concertName }}</span>
        </p>
        <p>Fecha del concierto:
            <span>{{ date('d/m/Y', strtotime( $detail_order->concertDates->date ))  }}</span>
        </p>
        <p>Cantidad de entradas:
            <span>{{ $detail_order->quantity }}</span>
        </p>
        <p>Valor Entrada:
            <span>${{ number_format($detail_order->concertDates->price, 0, '.', '.') }}</span>
        </p>
    </div>
    <hr>
    <div>
        <h2>Datos del cliente</h2>
        <p>Cliente:
            <span>{{ $user->name }}</span>
        </p>
        <p>Correo electrónico:
            <span>{{ $user->email }}</span>
        </p>
    </div>
    <hr>
    <div class="total">
        <p class="total-pay">Total pagado: ${{ number_format($detail_order->total, 0, '.', '.') }}</p>
        <p class="method-pay">
            @if ($detail_order->payment_method === 1)
                Efectivo
            @elseif ($detail_order->payment_method === 2)
                Transferencia
            @elseif ($detail_order->payment_method === 3)
                Tarjeta de Crédito
            @elseif ($detail_order->payment_method === 4)
                Tarjeta de Débito
            @endif
        </p>
    </div>
</body>

</html>