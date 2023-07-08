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
                <th>Nombre del Concierto</th>
                <th>Fecha del concierto</th>
                <th>Cantidad de entradas</th>
                <th>Cantidad de entradas vendidas</th>
                <th>Cantidad de entradas dispoibles</th>
                <th> </th>
            </tr>
        </thead>


        <tbody>
            @foreach ($user->concertsClient as $detailOrder)
            <tr>
                {{-- Nombre del Concierto --}}
                <td>
                    <p>
                        {{ $detailOrder }}
                    </p>
                </td>

                {{-- Fecha del concierto --}}
                <td>
                    <p>
                        {{ date('d/m/Y', strtotime($detailOrder->concertDates->date)) }}
                    </p>
                </td>

                {{-- Cantidad de entradas --}}
                <td>
                    <p>
                        {{ $detailOrder->concert->stock }}
                    </p>
                </td>

                {{-- Cantidad de entradas vendidas --}}
                <td>
                    <p>
                        {{ $detailOrder->quantity }}
                    </p>
                </td>

                {{-- Cantidad de entradas dispoibles --}}
                <td>
                    <p>
                        {{ $detailOrder->concert->availableStock }}
                    </p>
                </td>

                <td>
                    <a href="{{ route('admin.sellsDetail') }}"><button class="buttonDetail">Ver Detalle</button> </a>
                </td>



            </tr>
            @endforeach

            <tfoot>
                <th class="finalRow"> </th>
            </tfoot>


        </tbody>

    </table>

@endsection
