@extends('layout.base')
@section('tabTittle')
    Mis compras
@endsection

@vite('resources/css/table.css')

@section('content')
    <h1 class="titulo">Conciertos</h1>



    <table>

        <thead>
            <tr>
                <th>Número de reserva</th>
                <th>Nombre del Concierto</th>
                <th>Fecha del concierto</th>
                <th>Fecha de compra</th>
                <th>Cantidad de entradas</th>
                <th>Total pagado</th>
                <th>Medio de pago</th>
                <th></th>
            </tr>
        </thead>


        <tbody>
            @foreach ($detailsOrders as $detailOrder)
            <tr>
                {{-- Número de reserva --}}
                <td>
                    <p>
                        {{ $detailOrder->reservation_number }}
                    </p>

                </td>


                {{-- Nombre del concierto --}}
                <td>
                    <p>
                        {{ $detailOrder->concertDates->concertName }}
                    </p>
                </td>



                {{-- Fecha del concierto --}}
                <td>
                    <p>
                        {{ date('d/m/Y',strtotime($detailOrder->concertDates->date)) }}
                    </p>
                </td>



                {{-- Fecha de compra --}}
                <td>
                    <p>
                        {{ $detailOrder->voucher->detail_order_id }}
                        {{-- {{ date('d/m/Y',strtotime($detailOrder->voucher->date)) }} --}}
                    </p>
                </td>



                {{-- Cantidad de entradas compradas/disponibles/actuales(?) --}}
                <td>
                    <p>
                        {{ $detailOrder->quantity }}
                    </p>
                </td>



                {{-- Total pagado --}}
                <td>
                    <p>
                        ${{ $detailOrder->total }}
                    </p>
                </td>



                {{-- Medio de pago --}}
                <td>
                    <p>
                        @if ($detailOrder->payment_method === 1)
                            <p>
                                Efectivo
                            </p>
                        @elseif ($detailOrder->payment_method === 2)
                            <p>
                                Transferencia
                            </p>
                        @elseif ($detailOrder->payment_method === 3)
                            <p>
                                Tarjeta de Crédito
                            </p>
                        @elseif ($detailOrder->payment_method === 4)
                            <p>
                                Tarjeta de Débito
                            </p>
                        @endif
                    </p>
                </td>



                <td>
                    <a href="{{ route('admin.sellsDetail') }}">
                        <button class="buttonDetail">Ver Detalle</button>
                    </a>

                </td>
            </tr>
            @endforeach

            <tfoot>
                <th class="finalRow"> </th>
            </tfoot>


        </tbody>

    </table>

@endsection
