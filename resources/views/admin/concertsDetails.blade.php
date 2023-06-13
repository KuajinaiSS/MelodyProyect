@extends('layout.base')
@section('tabTittle')
Detalle de Conciertos
@endsection

@push('stylesTailwind')
@vite('resources/css/app.css')
@endpush


@section('content')
<h1>Concerts detail</h1>

<div class="mx-24 my-16 relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre del Concierto
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha del concierto
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
                    Monto total vendido
                </th>
                <th scope="col" class="px-6 py-3">
                    detalle
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($user->concertsClient as $detail_order)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        {{-- Nombre del Concierto LISTO--}}
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <p class="text-center">
                                {{ $detail_order->concertDates->name }}
                            </p>
                        </td>
                        {{-- Fecha del concierto LISTO--}}
                        <td class="px-6 py-4">
                            <p class="text-center">
                                {{ date('d/m/Y', strtotime($detail_order->concertDates->date)) }}
                            </p>
                        </td>
                        {{-- Cantidad de entradas LISTO--}}
                        <td class="px-6 py-4">
                            <p class="text-center">
                                {{ $detail_order->quantity }}
                            </p>
                        </td>
                        {{-- Cantidad de entradas vendidas --}}
                        <td class="px-6 py-4">
                            <p class="text-center">
                                {{ $detail_order->quantity }}
                            </p>
                        </td>
                        {{-- Cantidad de entradas disponibles --}}
                        <td class="px-6 py-4">
                            <p class="text-center">
                                {{ $detail_order->quantity }}
                            </p>
                        </td>
                        {{-- Monto total vendido LISTO--}}
                        <td class="px-6 py-4">
                            <p class="text-center">
                                {{ $detail_order->total }}
                            </p>
                        </td>

                        {{-- Detalle --}}
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>


            @endforeach
        </tbody>
    </table>
</div>
@endsection
