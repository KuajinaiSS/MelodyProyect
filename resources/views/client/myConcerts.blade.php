@extends('layout.base')
@section('tabTittle')
Mis compras
@endsection

@push('stylesTailwind')
@vite('resources/css/app.css')
@endpush

@section('content')

<h1>My concerts</h1>


<div class="mx-24 my-16 relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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

            @for ($i=0; $i < 10;$i++)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Juan
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>

                <td class="px-6 py-4">
                    $2999
                </td>

                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
