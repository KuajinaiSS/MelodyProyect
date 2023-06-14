@extends('layout.base')
@section('tabTittle')
    Detalle de Ventas
@endsection

@vite('resources/css/table.css')

@section('content')
    <h1 class="titulo">Detalle de Ventas</h1>

    @if ($allData->count() === 0)
        <p>lol</p>
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

                        </p>
                    </td>

                    {{-- Nombre del cliente LISTO--}}
                    <td>
                        <p>

                        </p>
                    </td>

                    {{-- Correo del cliente LISTO--}}
                    <td>
                        <p>

                        </p>
                    </td>

                    {{-- Fecha de la compra LISTO--}}
                    <td>
                        <p>

                        </p>
                    </td>

                    {{-- Cantidad de entradas compradas LISTO--}}
                    <td>
                        <p>

                        </p>
                    </td>

                    {{-- >Medio de pago LISTO--}}
                    <td>
                        <p>

                        </p>
                    </td>

                    {{-- Total pagado LISTO --}}
                    <td>
                        <p>

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
