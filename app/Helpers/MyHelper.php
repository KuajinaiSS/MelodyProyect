<?php
use Carbon\Carbon;
use App\Models\Concert;


function makeMessage(){

    $message = [
        'name.required' => 'Debe completar el campo "Nombre"',
        'name.min'=> 'El largo del nombre es inferior a 3',
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
        'date_search.required' => 'Ingrese una fecha válida.',
        'quantity.required' => 'Debe indicar la cantidad de entradas.',
        'quantity.min' => 'La cantidad de entradas debe ser mayor o igual a :min.',
        'pay_method.required' => 'Debe seleccionar un metodo de pago.',
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

    if ($quantity > $concert->stock) {
        return false;
    }
    return true;
}


function discountStock($id, $quantity)
{
    $concert = Concert::find($id);

    $concert->stock -= $quantity;
    $concert->save();
    return true;
}

function generateReservationNum()
{
    do {
        $number = mt_rand(1000, 9999);
    }
    while (substr($number, 0, 1) === '0');

    return $number;
}