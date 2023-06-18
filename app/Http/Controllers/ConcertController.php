<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index(){
        $concerts = Concert::getConcertsDate();

        foreach($concerts as $concert){
            $dateCorrectFormat = Carbon::create($concert->date)->format('d/m/Y');
            $concert->date = $dateCorrectFormat;
        }

        return view('concerts',[
            'concerts' => $concerts
        ]);
    }

    public function create(){

        return view('concert.create');
    }

    public function store(Request $request){

        //Create Error message
        $message = makeMessage();

        //Validate inputs
        $this->validate($request, [
            'concertName'=> ['required','min:5','max:2147483648'],
            'price' => ['required','numeric','min:20000','max:2147483647'],
            'stock' => ['required','numeric','between:100,400'],
            'date' => ['required','date','after:today']
        ], $message);

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

        return back()->with('confirmMessage','Concierto creado con éxito');


    }

    public function searchByDate(Request $request){

        //Create Error message
        $message = makeMessage();

        $this->validate($request,[
            'byDate' => ['required']
        ],$message);

        $concerts = Concert::getConcertsDate();
        $date = date($request->byDate);


        foreach ($concerts as $concert) {
            if ($concert->date == $date) {
                $dateCorrectFormat = Carbon::create($concert->date)->format('d/m/Y');
                $concert->date = $dateCorrectFormat;
                return back()->with('concertByDate',$concert);
            }
        }
        return back()->with('notFoundMessage','¡Lo sentimos! No hay conciertos para la fecha seleccionada');



    }
}
