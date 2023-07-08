@extends('layout.base')
@section('tabTittle')
    Usuarios
@endsection






@section('content')
@auth
@vite('resources/css/table.css')
@if(auth()->user()->role === 1)

    <img src="{{asset('img/marker.png')}}" class="marker2" width="25" height="6">
    @if ($detailOrders == null && $user == null)
        <h1 class="tittle">¡Busca un Usuario!</h1>
    @elseif($detailOrders != null && $user != null)
        <h1 class="userName">{{$user->name}}</h1>
    @endif

    <div class="search">
        <form action="{{route('user.info')}}" method="GET" novalidate>
            <input class= "byEmail" id="byEmail" name="byEmail" type="search" placeholder="Ingresa un correo electrónico">
            <input type="submit" value="Buscar" class="searchBtn">
        </form>
        <a href="{{route('users')}}" class="clearSearch">Limpiar Filtros</a>
    </div>
    @if ($user == null)
        @if ($message != null)
            <div class="noData">{{$message}}</div>
        @endif
    @elseif ($detailOrders != null && $detailOrders->count() === 0 && $user != null)
        <div class="noData">El cliente {{$user->name}} no ha adquirido entradas</div>
    @elseif($detailOrders != null && $detailOrders->count() > 0)
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
                </tr>
            </thead>
            <tbody>

                @foreach ($detailOrders as $detailOrder)
                <tr>
                    {{-- Número de reserva --}}
                    <td>
                        <p>
                            {{$detailOrder->reservation_number}}

                        </p>
                    </td>
                    {{-- Nombre del Concierto --}}
                    <td>
                        <p>
                            {{$detailOrder['concert']->concertName}}
                        </p>
                    </td>
                    {{-- Fecha del concierto --}}
                    <td>
                        <p>
                            {{date('d/m/Y', strtotime( $detailOrder['concert']->date))}}
                        </p>
                    </td>
                    {{-- Fecha de compra --}}
                    <td>
                        <p>
                            {{date('d/m/Y H:i', strtotime( $detailOrder->created_at ))}}
                        </p>
                    </td>
                    {{-- Cantidad de entradas --}}
                    <td>
                        <p>
                            {{$detailOrder->quantity}}
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
                    {{-- Descarga Pdf --}}
                    <td>
                        <p>

                            <a href="{{ route('pdf.descargar', ['id' => $detailOrder->voucherId ])}}">
                                <button class="buttonDetail">Comprobante</button>
                            </a>

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

@elseif(auth()->user()->role === 0)
<meta http-equiv="refresh" content = "0;{{route("viewHome")}}">
@endif
@endauth
@endsection


