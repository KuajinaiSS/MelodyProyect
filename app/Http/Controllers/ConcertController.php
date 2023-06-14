<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Concert;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConcertController extends Controller
{
    public function index(){
        $concerts = Concert::getConcerts();
        return view('concerts',[
            'concerts' => $concerts
        ]);
    }

    public function indexConcertDetails(){
        $concerts = Concert::getConcerts();
        return view('admin.concertsDetails',[
            'concerts' => $concerts
        ]);
    }

    public function indexSellsConcertDetails($id_concert){
        $details = DetailOrder::getDetailsByConcert($id_concert);
        $collection = collect([]);
        foreach($details as $detail){
            $user = User::findOrFail($detail->$user_id);
            $data = [
                'user' => $user,
                'detail_order' => $detail,
            ];
            $collection.add($data);
        }

        return view('admin.sellsDetails',[
            'allData' => $collection
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
}
