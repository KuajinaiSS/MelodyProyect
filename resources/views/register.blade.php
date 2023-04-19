<link href="{{asset('assets/styles.css')}}" rel="stylesheet" type="text/css" >
<form action="action_page.php">
  <body >
  <div class="container">
    
    <h1> <img src =  "assets/Logo-Melody.png" alt="Melody" width="60" height="60" align = "center"> Melody</h1>
    <p align = center>¡Crea tu cuenta!</p>
    <hr>
    <div type = "container mid">
    <label for="email"><b>NOMBRE DE USUARIO</b></label>
    <input type="text" placeholder=" " name="usuario" id="email" required>

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
