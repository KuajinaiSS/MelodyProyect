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
            'password' => ['required', 'min:8']
        ], $message);

        // Se intenta validar al usuario
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Los datos ingresados son incorrectos');
        }

        return redirect()->route('dashboard');
    }
}
