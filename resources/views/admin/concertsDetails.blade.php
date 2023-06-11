@extends('layout.base')
@section('tabTittle')
Detalle de conciertos
@endsection

@push('stylesTailwind')
@vite('resources/css/app.css')
@endpush

@section('content')

<h1>Concerts detail</h1>

<div class="mx-24 my-16 relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full mx-auto myTable text-sm text-center text-white">
        <thead class="text-xs text-white uppercase Blue">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre del Concierto
                </th>
                <th scope="col" class="px-6 py-3">
                    Cantidad de entradas
                </th>
                <th scope="col" class="px-6 py-3">
                    Cantidad de entradas vendidas
                </th>
                <th scope="col" class="px-6 py-3">
                    Cantidad de entradas disponibles
                </th>
                <th scope="col" class="px-6 py-3">
                    Monto vendido
                </th>
                <th scope="col" class="px-6 py-3">
                    XD
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->concertsClient as $detail_order)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    {{-- Numero de reserva --}}
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <p class="text-center">
                            {{ $detail_order->reservation_number }}
                        </p>
                    </td>
                    {{-- Nombre de Concierto --}}
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $detail_order->concertDates->name }}
                        </p>
                    </td>
                    {{-- Fecha Concierto --}}
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ date('d/m/Y', strtotime($detail_order->concertDates->date)) }}
                        </p>
                    </td>
                    {{-- Fecha Compra --}}
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ date('d/m/Y H:i:s', strtotime($detail_order->created_at)) }}
                        </p>
                    </td>
                    {{-- Cantidad Entradas --}}
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $detail_order->quantity }}
                        </p>
                    </td>
                    {{-- Total Pagado --}}
                    <td class="px-6 py-4">
                        <p class="text-center">
                            {{ $detail_order->total }}
                        </p>
                    </td>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
