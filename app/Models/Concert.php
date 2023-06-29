<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;
    protected $fillable=[
        'concertName',
        'price',
        'stock',
        'date',
        'availableStock'
    ];

    public static function getConcerts(){
        return self::all();
    }

    public static function getConcertsDate(){
        $actualDate = date("Y-m-d");
        return Concert::where('date', '>=', $actualDate)->get();
    }

}

