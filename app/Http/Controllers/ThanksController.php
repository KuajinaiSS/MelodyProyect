<?php

namespace App\Http\Controllers;

use app\Helpers\MyHelper;
use Illuminate\Http\Request;

class ThanksController extends Controller
{
    public function index(){
        return view('client.thanksMsg');
    }

}
