<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Concert;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index(){
        return view('buy');
    }

    public function create($id){
        $concert = Concert::find($id);
        $dateCorrectFormat = Carbon::create($concert->date)->format('d/m/Y');
        $concert->date = $dateCorrectFormat;

        return view('buy', [
            'concert' => $concert
        ]);
    }

    public function store(Request $request, $id){
        $reservationNumber = generateReservationNum();
        $concert = Concert::find($id);
        $request->request->add(['reservation_number' => $reservationNumber]);
        $message = makeMessage();
        $this->validate($request,[
            'reservation_number' => ['min:4','max:4'],
            'quantity' => ['required','numeric','min:1'],
            'payMethod' => ['required','min:1','max:4'],
            'total' => ['required']
        ], $message);
        $validStock = verifyStock($id, $request->quantity);

        if(!$validStock){
            return back()->with('message','La cantidad de entradas ingresada no es numérica o supera las entradas disponibles a comprar');
        }

        $buyDetail = DetailOrder::create([
            'reservation_number' => $request->reservation_number,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'payment_method' => $request->payMethod,
            'user_id' => auth()->user()->id,
            'concert_id' => $id
        ]);

        discountStock($id,$request->quantity);

        return redirect()->route('generate.pdf', [
            'id' => $buyDetail->id
        ]);

    }




}
