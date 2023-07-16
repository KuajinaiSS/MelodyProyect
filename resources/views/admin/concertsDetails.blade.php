@extends('layout.base')
@section('tabTittle')
    Detalle de Conciertos
@endsection






@section('content')
@auth
@vite(['resources/css/table.css', 'resources/css/tooltip.css'])
@if(auth()->user()->role === 1)


    <img src="{{asset('img/marker.png')}}" class="marker" width="25" height="6">
    <h1 class="title">Detalle Conciertos</h1>

    @if ($concerts->count() === 0)
        <p class="errorMsg" style="text-align: center">No hay conciertos por mostrar</p>
    @endif

    @if($concerts->count() > 0)
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
                            {{$concert->concertName }}

                        </p>
                    </td>
                    {{-- Fecha del concierto LISTO --}}
                    <td>
                        <p>
                            {{ $concert->date  }}
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
                            {{ $concert->stock - $concert->availableStock }}
                        </p>
                    </td>
                    {{-- Cantidad de entradas disponibles --}}
                    <td>
                        <p>
                            {{ $concert->availableStock }}
                        </p>
                    </td>
                    {{-- Monto total vendido --}}
                    <td>
                        <p>
                            ${{number_format($concert->price * ($concert->stock - $concert->availableStock),0,'.','.') }}
                        </p>
                    </td>

                    {{-- Detalle LISTO--}}
                    <td>
                        @if ($concert->availableStock != $concert->stock)
                        <div class="tooltipDer">
                            <span class="tooltiptext">Información y detalles de venta del concierto 💸</span>
                            <a href="{{ route('admin.sellsDetail', ['id'=> $concert->id]) }}">
                                <button class="buttonDetail">Ver Detalle</button>
                            </a>
                        </div>
                        @else
                        <div class="tooltipDer">
                            <span class="tooltiptext">Este concierto no ha vendido entradas ☹️</span>
                            <button class="buttonDetailOff" deactive>Ver Detalle</button>
                        </div>
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
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">
@endif
@endauth
@endsection



