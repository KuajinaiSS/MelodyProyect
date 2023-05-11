<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function create(){

        return view('concert.create');
    }

    public function store(Request $request){

        //Create Error message
        $message = makeMessage();



        //Validate inputs
        $this->validate($request, [
            'concertName'=> ['required','min:5'],
            'price' => ['required','numeric','min:20000','max:2147483647'],
            'stock' => ['required','numeric','between:100,400'],
            'date' => ['required','date']
        ], $message);


        //verify date format
        $invalidDate = validDate($request->date);
        if($invalidDate){
            return back()->with('message', 'La fecha debe ser mayor a '. date("d-m-Y"));
        }

        $existConcert = existConcertDay($request->date);
        if($existConcert){
            return back()->with('message','Ya existe un concierto para el día ingresado');
        }

        Concert::create([
            'concertName' => $request->concertName,
            'price' => $request->price,
            'stock' => $request->stock,
            'date' => $request->date
        ]);

        return back()->with('message','Concierto creado con exito');


    }
}
