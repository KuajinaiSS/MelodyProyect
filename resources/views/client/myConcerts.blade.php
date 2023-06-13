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
                    <th>Cantidad de entradas</th>
                    <th>Cantidad de entradas vendidas</th>
                    <th>Cantidad de entradas disponibles</th>
                    <th>Monto vendido</th>
                    <th>XD</th>
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
                            <button class="buttonDetail">Ver Detalle</button>
                        </td>
                    </tr>
                @endfor

                <tfoot>
                    <th class="finalRow">  </th>
                </tfoot>

            </tbody>

        </table>
@endsection
