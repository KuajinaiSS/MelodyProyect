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

            @for ($i=0; $i < 10;$i++)
                <tr class="border-black Cyan">
                    <th scope="row" class="px-6 py-4">
                        Juan
                    </th>

                    <td class="px-6 py-4">
                        Silver
                    </td>

                    <td class="px-6 py-4">
                        Laptop
                    </td>

                    <td class="px-6 py-4">
                        300
                    </td>

                    <td class="px-6 py-4">
                        $2999
                    </td>

                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>

            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
