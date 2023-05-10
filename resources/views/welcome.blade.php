<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <label for="email"><b>CORREO ELECTRÓNICO</b></label>
    <input type="text" placeholder=" " name="email" id="email" required>


    <label for="psw"><b>CONTRASEÑA</b></label>
    <input type="password" placeholder=" " name="psw" id="psw" required>
</div>
    <button type="submit" class="registerbtn">REGISTRAR</button>
  </div>

  <div class="container signin">
    <p>¿Ya tienes una cuenta? <a href="#">¡Inicia sesión aquí!</a>.</p>
  </div>

</body>
<footer> <p>  Melody. Derechos reservados 2023</p></footer>
</form>

@endsection
