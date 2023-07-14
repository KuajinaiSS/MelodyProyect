@extends('layout.base')
@section('tabTittle')
    Mis compras
@endsection



@section('content')
    @auth
    @vite('resources/css/table.css')
        @if (auth()->user()->role === 0)
            <img src="{{ asset('img/marker.png') }}" class="marker3" width="25" height="6">
            <h1 class="tittle">Mis Conciertos</h1>


            {{-- Si no a comprado ningun concierto --}}
            @if ($detailsOrders->count() === 0)
                <p class="errorMsg" style="text-align: center">No hay entradas adquiridas por desplegar</p>
            @endif

            @if ($detailsOrders->count() > 0)
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
                            <th>Comprobante</th>
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
                                        {{ date('d/m/Y', strtotime($detailOrder->concertDates->date)) }}
                                    </p>
                                </td>



                                {{-- Fecha de compra --}}
                                <td>
                                    <p>
                                        {{ date('d/m/Y H:i', strtotime($detailOrder->voucher->created_at)) }}
                                    </p>
                                </td>



                                {{-- Cantidad de entradas compradas/disponibles/actuales(?) --}}
                                <td>
                                    <p>
                                        {{ number_format($detailOrder->quantity, 0, '.', '.') }}
                                    </p>
                                </td>



                                {{-- Total pagado --}}
                                <td>
                                    <p>
                                        ${{ number_format($detailOrder->total, 0, '.', '.') }}
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
                                    <a href="{{ route('pdf.descargar', ['id' => $detailOrder->voucher->id]) }}">
                                        <button class="buttonDetail">
                                            Comprobante
                                        </button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                    <tfoot>
                        <th class="finalRow"> </th>
                    </tfoot>


                    </tbody>

                </table>
            @endif
        @elseif(auth()->user()->role === 0)
            <meta http-equiv="refresh" content="0;{{ route('viewHome') }}">
        @endif
    @endauth
@endsection
