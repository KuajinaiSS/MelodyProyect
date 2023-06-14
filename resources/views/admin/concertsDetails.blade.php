@extends('layout.base')
@section('tabTittle')
    Detalle de Conciertos
@endsection

@vite('resources/css/table.css')

@section('content')
    <h1 class="titulo">Detalle Concierto</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre del Concierto</th>
                <th>Fecha del concierto</th>
                <th>Cantidad de entradas</th>
                <th>Cantidad de entradas vendidas</th>
                <th>Cantidad de entradas disponibles</th>
                <th>Monto total vendido</th>
                <th>detalle</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($concerts as $concert)
                <tr>
                    {{-- Nombre del Concierto LISTO --}}
                    <td>
                        <p>
                            {{$concert->concertName }}

                        </p>
                    </td>
                    {{-- Fecha del concierto LISTO --}}
                    <td>
                        <p>
                            {{ date('d/m/Y', strtotime( $concert->date )) }}
                        </p>
                    </td>
                    {{-- Cantidad de entradas LISTO --}}
                    <td>
                        <p>
                            {{ $concert->stock }}
                        </p>
                    </td>
                    {{-- Cantidad de entradas vendidas --}}
                    <td>
                        <p>
                            {{ $concert->stock }}
                        </p>
                    </td>
                    {{-- Cantidad de entradas disponibles --}}
                    <td>
                        <p>
                            {{ $concert->stock }}
                        </p>
                    </td>
                    {{-- Monto total vendido --}}
                    <td>
                        <p>
                            ${{ $concert->price }}
                        </p>
                    </td>

                    {{-- Detalle --}}
                    <td>
                        <a href={{ route('admin.sellsDetail', ['id_concert'=> $concert->id]) }}>
                            <button class="buttonDetail">Ver Detalle</button>
                        </a>
                    </td>
            @endforeach

            <tfoot>
                <th class="finalRow"> </th>
            </tfoot>

        </tbody>
    </table>
    </div>
@endsection
