<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $detail_order->reservation_number . '-' . $detail_order->concertDates->date }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');

        body {
            font-family: 'League Spartan';
            src: url(https://fonts.gstatic.com/s/leaguespartan/v11/kJEnBuEW6A0lliaV_m88ja5Twtx8BWhtkDVmjZvMGYPZA81d.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
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
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

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
            <span>{{ $detail_order->concertDates->name }}</span>
        </p>
        <p>Fecha del concierto:
            <span>{{ $detail_order->concertDates->date }}</span>
        </p>
        <p>Cantidad de entradas:
            <span>{{ $detail_order->quantity }}</span>
        </p>
        <p>Valor Entrada:
            <span>{{ $detail_order->concertDates->price }}</span>
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
        <p class="total-pay">Total pagado: {{ $detail_order->total }}</p>
        <p class="method-pay">{{ $detail_order->payment_method }}</p>
    </div>
</body>

</html>
