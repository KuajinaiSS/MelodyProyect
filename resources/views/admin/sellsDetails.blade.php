@extends('layout.base')
@section('tabTittle')
    Detalle de Ventas
@endsection

@vite('resources/css/table.css')

@section('content')
    <h1 class="titulo">{{ $concert->concertName }}</h1>


    @if ($allData->count() === 0)
        <p style="text-align: center">No existen compras para este concierto</p>
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

                    {{-- Fecha de la compra LISTO--}}
                    <td>
                        <p>
                            23/09/2034
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
                            Tarjeta de débito
                        </p>
                    </td>

                    {{-- Total pagado LISTO --}}
                    <td>
                        <p>
                            ${{ $data['detail_order']->total }}
                        </p>
                    </td>
            @endforeach

            <tfoot>
                <th class="finalRow"> </th>
            </tfoot>

        </tbody>
    </table>
    @endif
    </div>
@endsection
