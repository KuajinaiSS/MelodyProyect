@extends('layout.base')
@section('tabTittle')
    Detalle de Conciertos
@endsection

@section('content')
    @auth
        @vite('resources/css/table.css')
        @if (auth()->user()->role === 1)
            <img src="{{ asset('img/marker.png') }}" class="marker" width="25" height="6">
            <h1 class="tittle">Detalle Conciertos</h1>

            @if ($concerts->count() === 0)
                <p class="errorMsg" style="text-align: center">No hay conciertos por mostrar</p>
            @endif

            @if ($concerts->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Nombre del Concierto</th>
                            <th>Fecha del concierto</th>
                            <th>Cantidad de entradas</th>
                            <th>Cantidad de entradas vendidas</th>
                            <th>Cantidad de entradas disponibles</th>
                            <th>Monto total vendido</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($concerts as $concert)
                            <tr>
                                {{-- Nombre del Concierto LISTO --}}
                                <td>
                                    <p>
                                        {{ $concert->concert_name }}

                                    </p>
                                </td>
                                {{-- Fecha del concierto LISTO --}}
                                <td>
                                    <p>
                                        {{ $concert->date }}
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
                                        {{ $concert->stock - $concert->available_stock }}
                                    </p>
                                </td>
                                {{-- Cantidad de entradas disponibles --}}
                                <td>
                                    <p>
                                        {{ $concert->available_stock }}
                                    </p>
                                </td>
                                {{-- Monto total vendido --}}
                                <td>
                                    <p>
                                        ${{ number_format($concert->price * ($concert->stock - $concert->available_stock), 0, '.', '.') }}
                                    </p>
                                </td>

                                {{-- Detalle LISTO --}}
                                <td>
                                    @if ($concert->available_stock != $concert->stock)
                                        <a href="{{ route('admin.sellsDetail', ['id' => $concert->id]) }}">
                                            <button class="buttonDetail">Ver Detalle</button>
                                        </a>
                                    @else
                                        <button class="buttonDetailOff" deactive>Ver Detalle</button>
                                    @endif

                                </td>
                        @endforeach

                    <tfoot>
                        <th class="finalRow"> </th>
                    </tfoot>

                    </tbody>
                </table>
            @endif
            </div>
        @elseif(auth()->user()->role === 0)
            <meta http-equiv="refresh" content="0;{{ route('viewHome') }}">
        @endif
    @endauth
@endsection
