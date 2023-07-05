<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Concert;
use App\Models\Voucher;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function indexConcertDetails(){
        $concerts = Concert::getConcerts();
        foreach($concerts as $concert){
            $dateCorrectFormat = Carbon::create($concert->date)->format('d/m/Y');
            $concert->date = $dateCorrectFormat;
        }

        return view('admin.concertsDetails',[
            'concerts' => $concerts
        ]);
    }

    public function indexMyConcerts(){

        return view('client.myConcerts');
    }




    public function indexSellsConcertDetails($id_concert){
        $details = DetailOrder::getDetailOrder();

        $concert = Concert::findOrFail($id_concert);
        $collection = collect();


        foreach($details as $detail){
            if($detail->concert_id == $id_concert){
                $user = User::findOrFail($detail->user_id);
                $voucher = Voucher::where('detail_order_id',$detail->id)->first();
                $data = [
                    'user' => $user,
                    'detail_order' => $detail,
                    'voucher_id' => $voucher->id
                ];
                $collection->push($data);
            }

        }

        return view('admin.sellsDetails',[
            'allData' => $collection,
            'concert' => $concert
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
            'date' => $request->date,
            'availableStock' => $request->stock
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
        return back()->with('notFoundMessage','No hay conciertos disponibles para el día seleccionado, intenta con otra fecha o recarga la página');


    }
}
