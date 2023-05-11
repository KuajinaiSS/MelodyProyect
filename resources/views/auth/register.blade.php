@extends('layout.base');

@section('contenido')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <form action="action_page.php">


        <body style="scale:.8">
            <div class="container">

                <h1> <img src={{ asset('img/Logo-Melody.png') }} alt="Melody" width="60" height="60" align="center">
                    Melody</h1>
                <p align=center>¡Crea tu cuenta!</p>


                <label for="email"><b>NOMBRE DE USUARIO</b></label>
                <input type="text" placeholder=" " name="usuario" id="email" required>

                <label for="email"><b>CORREO ELECTRÓNICO</b></label>
                <input type="text" placeholder=" " name="email" id="email" required>


                <label for="psw"><b>CONTRASEÑA</b></label>
                <input type="password" placeholder=" " name="psw" id="psw" required>
                <div class="container signin">
                    <p>¿Ya tienes una cuenta? <a href="iniciarSesion">¡Inicia sesión aquí!</a>.</p>
                </div>
                <button type="submit" class="registerbtn" href="{{ route('iniciarSesion') }}">REGISTRAR</button>
            </div>
            <p>¡Crea tu cuenta!</p>
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="name">
                    <div><label>NOMBRE</label></div>
                    <input id="name" name="name" type="text" width="400px">
                    @error('name')
                        <div class="errorMsg">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="email">
                    <div><label>CORREO ELECTRÓNICO</label></div>
                    <input id="email" name="email" type="text">
                    @error('email')
                        <div class="errorMsg">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="password">
                    <div><label>CONTRASEÑA</label></div>
                    <input id="password" name="password" type="password">
                    @error('password')
                        <div class="errorMsg">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="register"><a href="{{ route('login') }}">¿Ya tienes cuenta? ¡Inicia sesión aquí!</a></div>
                <input type="submit" value="REGISTRAR">
            </form>

            </div>
        </body>

        </html>
