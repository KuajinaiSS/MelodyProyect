<?php
use Carbon\Carbon;
use App\Models\Concert;


function makeMessage(){

    $message = [
        'name.required' => 'Debe completar el campo "Nombre"',
        'name.min'=> 'El largo del nombre es inferior a 3',
        'name.regex' => 'El nombre contiene caracteres no permitidos. Ingrese solo letras',
        'email.required' => 'Debe completar el campo "Email"',
        'email.unique' => 'El correo ingresado ya existe en el sistema. Intente iniciar sesión',
        'email.email' => 'El correo ingresado no es valido',
        'password.required' => 'Debe completar el campo "Contraseña"',
        'password.min' => 'La contraseña posee menos de 8 caracteres',
        'password.regex' => 'La contraseña ingresada no es alfanumérica',
        'concertName.required' => 'Debe completar el campo "Nombre del concierto"',
        'concertName.min' => 'El campo "Nombre del concierto" no puede ser inferior a 5 caracteres',
        'price.required' => 'Debe completar el campo "Precio"',
        'price.numeric' => 'El valor ingresado no es numérico',
        'price.min' => 'El valor de la entrada no puede ser inferior a $20.000 pesos',
        'stock.required' => 'Debe completar el campo "Stock"',
        'stock.numeric' => 'El valor ingresado no es numérico o es inferior a 100 y superior a 400',
        'stock.between' => 'El valor ingresado no es numérico o es inferior a 100 y superior a 400',
        'date.required' => 'Debe completar el campo "Fecha"',
    ];

    return $message;
}

function validDate($date)
{
    $fechaActual = date("d-m-Y");
    $fechaVerificar = Carbon::parse($date);

    if ($fechaVerificar->lessThanOrEqualTo($fechaActual)) {
        return true;
    }

    return false;
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
