<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concert;
use App\Models\BuyDetail;

class buyController extends Controller
{
    public function index(){
        return view('buy');
    }

    public function create($id){
        $concert = Concert::find($id);
        return view('buy', [
            'concert' => $concert
        ]);
    }

    public function store(Request $request, $id){
        $reservationNumber = generateReservationNum();

        $request->request->add(['reservation_number' => $reservationNumber]);

        $messages = makeMessage();
        $this->validate($request,[
            'quantity' => ['required','numeric','min::1'],
            'payMethod' => ['required'],
            'total' => ['required']
        ], $messages);

        $validStock = verifyStock($id, $request->quantity);

        if(!$validStock){
            return back()->with('message','No hay suficiente stock para este concierto');
        }

        $buyDetail = BuyDetail::create([
            'reservation_number' => '1234',
            'quantity' => $request->quantity,
            'total' => $request->total,
            'payment_method' => $request->pay_method,
            'user_id' => auth()->user()->id,
            'concert_id' => $id
        ]);

        discountStock($id,$request->quantity);


        /* Cuando se agregue el pdf
        return redirect()->route('generate.pdf', [
            'id' => $buyDetail->id
        ]);
        */
    }




}
