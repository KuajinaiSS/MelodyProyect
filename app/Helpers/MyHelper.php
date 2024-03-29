<?php
use Carbon\Carbon;
use App\Models\Concert;
use App\Models\DetailOrder;


function makeMessage(){

    $message = [
        'name.required' => 'Debe completar el campo "Nombre"',
        'name.min'=> 'El largo del nombre es inferior a 3 caracteres',
        'name.max'=> 'El nombre ingresado no es valido',
        'name.regex' => 'El nombre contiene caracteres no permitidos. Ingrese solo letras',
        'email.required' => 'Debe completar el campo "Correo electrónico"',
        'email.unique' => 'El correo ingresado ya existe en el sistema. Intente iniciar sesión',
        'email.email' => 'El correo ingresado no es válido',
        'email.max' => 'El correo ingresado no es válido',
        'password.required' => 'Debe completar el campo "Contraseña"',
        'password.min' => 'La contraseña posee menos de 8 caracteres',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',
        'password.max' => 'La contraseña ingresado no es válido',
        'concertName.required' => 'Debe completar el campo "Nombre del concierto"',
        'concertName.min' => 'El campo "Nombre del concierto" no puede ser inferior a 5 caracteres',
        'concertName.max'=> 'El nombre ingresado no es valido',
        'price.required' => 'Debe completar el campo "Precio"',
        'price.numeric' => 'El valor ingresado no es numérico',
        'price.min' => 'El valor de la entrada no puede ser inferior a $20.000 pesos',
        'price.max' => 'El valor ingresado no es válido',
        'stock.required' => 'Debe completar el campo "Stock"',
        'stock.numeric' => 'El valor ingresado no es numérico o es inferior a 100 y superior a 400',
        'stock.between' => 'El valor ingresado no es numérico o es inferior a 100 y superior a 400',
        'date.required' => 'Debe completar el campo "Fecha"',
        'date.after' => 'La fecha debe ser mayor a '. date("d-m-Y"),
        'date_search.required' => 'Ingrese una fecha válida',
        'quantity.required' => 'Debe completar el campo "Cantidad de entradas"',
        'quantity.numeric' => 'La cantidad de entradas ingresada no es numérica o supera las entradas disponibles a comprar',
        'quantity.min' => 'La cantidad de entradas ingresada no es numérica o es igual a 0',
        'payMethod.required' => 'Debe completar el campo "Método de pago"',
        'reservation_number.min' => 'Error del sistema, inténtelo más tarde',
        'reservation_number.max' => 'Error del sistema, inténtelo más tarde',

    ];

    return $message;
}

function existConcertDay($date_concert)
{
    $concerts = Concert::getConcerts();
    $date = date($date_concert);

    foreach ($concerts as $concert) {

        if ($concert->date == $date) {
            return true;
        }
    }
    return false;
}

function verifyStock($id, $quantity)
{
    $concert = Concert::find($id);

    if ($quantity > $concert->availableStock) {
        return false;
    }
    return true;
}


function discountStock($id, $quantity)
{
    $concert = Concert::find($id);
    $concert->availableStock -= $quantity;
    $concert->save();
    return true;
}

function generateReservationNum()
{
    $details = DetailOrder::getDetailOrder();
    $reservationNumber = 999;
    foreach ($details as $detail){
        $reservationNumber = $detail->reservation_number;
    }

    return $reservationNumber += 1;

}
