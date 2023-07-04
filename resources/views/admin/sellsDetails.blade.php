@auth
@if(auth()->user()->role === 1)
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/MelodyLogo.png')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <title>Detalle de Ventas</title>

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

    <h1 class="tittle">{{ $concert->concertName }}</h1>
    <h2 class="concertDate">{{date('d/m/Y', strtotime( $concert->date ))  }}</h2>


    @if ($allData->count() === 0)
        <p class="errorMsg" style="text-align: center">No hay entradas vendidas por desplegar</p>
    @endif

    @if($allData->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Número de reserva</th>
                <th>Nombre del cliente</th>
                <th>Correo del cliente</th>
                <th>Fecha de la compra</th>
                <th>Cantidad de entradas compradas</th>
                <th>Medio de pago</th>
                <th>Total pagado</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($allData as $data)

                <tr>
                    {{-- Numero de reserva LISTO--}}
                    <td>
                        <p>
                            {{ $data['detail_order']->reservation_number }}
                        </p>
                    </td>

                    {{-- Nombre del cliente LISTO--}}
                    <td>
                        <p>
                            {{ $data['user']->name }}
                        </p>
                    </td>

                    {{-- Correo del cliente LISTO--}}
                    <td>
                        <p>
                            {{ $data['user']->email }}
                        </p>
                    </td>

                    {{-- Fecha de la compra --}}
                    <td>
                        <p>
                            {{ date('d/m/Y H:i', strtotime( $data['detail_order']->created_at ))  }}
                        </p>
                    </td>

                    {{-- Cantidad de entradas compradas LISTO--}}
                    <td>
                        <p>
                            {{ $data['detail_order']->quantity }}
                        </p>
                    </td>

                    {{-- >Medio de pago LISTO--}}
                    <td>
                        <p>
                            @if ($data['detail_order']->payment_method === 1)
                            <p>
                                Efectivo
                            </p>
                            @elseif ($data['detail_order']->payment_method === 2)
                            <p>
                                Transferencia
                            </p>
                            @elseif ($data['detail_order']->payment_method === 3)
                            <p>
                                Tarjeta de Crédito
                            </p>
                            @elseif ($data['detail_order']->payment_method === 4)
                            <p>
                                Tarjeta de Débito
                            </p>
                            @endif
                        </p>
                    </td>

                    {{-- Total pagado LISTO --}}
                    <td>
                        <p>
                            ${{ number_format($data['detail_order']->total, 0, '.', '.') }}
                        </p>
                    </td>

                    {{--                     <td>

                        <a href="{{ route('pdf.descargar', ['id' =>  $data['voucher_id']]) }}">
                            <button class="buttonDetail">Descargar PDF</button>
                        </a>

                    </td> --}}

            @endforeach

            <tfoot>
                <th class="finalRow"> </th>
            </tfoot>

        </tbody>
    </table>
    @endif


    </div>

    <footer class="pageFooter">
        <h3 class="tradeMark">Melody™</h3>
        <p class="copyrigth"> Todos los derechos reservados - 2023. </p>
    </footer>
</body>



@elseif(auth()->user()->role === 0)
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">

@endif
@endauth




