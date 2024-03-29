<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'pdf_name',
        'path',
        'date',
        'detail_order_id'
    ];
}
