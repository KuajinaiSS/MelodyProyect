<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $message = makeMessage();
        // Validate
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ], $message);

        // tryng to validate user
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Usuario no registrado o contraseña incorrecta ');
        }

        return redirect()->route('viewHome');
    }
}
