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
            @for ($i = 0; $i < 10; $i++)
                <tr>
                    <td>Juan</td>
                    <td>Silver</td>
                    <td>Laptop</td>
                    <td>$2999</td>
                    <td>$2999</td>
                    <td>
                        <a href="{{ route('admin.sellsDetail') }}"><button class="buttonDetail">Ver Detalle</button> </a>
                    </td>
                </tr>
            @endfor

        <tfoot>
            <th class="finalRow"> </th>
        </tfoot>

        </tbody>

    </table>
@endsection
