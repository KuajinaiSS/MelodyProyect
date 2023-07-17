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
            'name' => ['required','min:3','max:2147483648', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/'],
            'email' => ['required', 'email','unique:users','max:2147483648'],
            'password' => ['required','min:8','regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/','max:2147483648'],
        ],$message);

        //Create user
        User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
            'role' => 0,
        ]);

        //Auth user
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);


        //redirect
        return redirect()->route('viewHome');
    }
}
