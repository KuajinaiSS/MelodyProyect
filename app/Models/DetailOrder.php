<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_number',
        'quantity',
        'total',
        'payment_method',
        'user_id',
        'concert_id'
    ];


    public static function getDetailOrder(){
        return self::all();
    }

    public static function getDetailsByConcert($id_concert){
        return DetailOrder::where('concert_id','=',$id_concert)->orderBy('created_at','asc')->get();
    }


    public static function getDetailsByUser($id_user){
        return DetailOrder::where('user_id','==',$id_user)->get();
    }


    public function concertDates()
    {
        return $this->belongsTo(Concert::class, 'concert_id');
    }

    public function voucher()
    {
        return $this->hasOne(Voucher::class, 'detail_order_id');
    }

}
