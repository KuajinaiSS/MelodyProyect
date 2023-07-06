<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Concert;
use App\Models\DetailOrder;
use App\Models\Voucher;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.userInfo',[
            'message' => null,
            'user' => null,
            'detailOrders' => null,
        ]);
    }

    public function getUser(Request $request){
        $email = $request->byEmail;
        $user = User::where('email',"=",$email)->first();
        if(!$user){
            return view('admin.userInfo',[
                'message' => 'El correo electrónico no existe',
                'user' => null,
                'detailOrders' => null,
            ]);
        }
        else{
            $detailOrders = DetailOrder::where('user_id', "=", $user->id)->get();
            foreach($detailOrders as $detailOrder){

                $voucher = Voucher::where('detail_order_id',"=",$detailOrder->id)->first();
                $detailOrder['voucherId'] = $voucher->id;
                $concert = Concert::findOrFail($detailOrder->concert_id);
                $detailOrder['concert'] = $concert;
            }

            return view('admin.userInfo',[
                'message' => null,
                'user' => $user,
                'detailOrders' => $detailOrders,
            ]);
        }
    }
}
