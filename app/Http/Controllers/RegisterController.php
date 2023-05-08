<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        return view('auth.register');
    }

    public function show()
    {
        return view('formulario');
    }

    public function store(Request $request){

        $message = makeMessage();
        //validate
        $this->validate($request, [
            'name' => ['required','min:3', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required','min:8','regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'],
        ],$message);

        //Create user
        User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
        ]);

        //Auth user
        /*auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);*/


        //redirect
        dd('Se registro el usuario');
    }
}
