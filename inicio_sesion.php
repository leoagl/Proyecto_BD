<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="account_login.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio Sesión</title>
    <link rel="stylesheet" href="estilos.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="s.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Iniciar sesión</h1>
      <form id="login-form" method="post" action="procesar_login.php">
        <div class="form-group">
          <label for="username">Correo Electronico</label>
          <br>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <br>
          <input type="password" id="password" name="password" required />
          <span class="toggle-password" onclick="togglePasswordVisibility()"> <i class="fa fa-eye"></i></span>
        </div>
        <div class="form-group">
          <input
            type="submit"
            value="Iniciar sesión"
            onclick="return validarDatos();"
          />
        </div>
      </form>
    </div>

    <script>
      function validarDatos(event) {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var role = document.getElementById("role").value;

        if (username === "" || password === "" ) {
          
          alert("Por favor, complete todos los campos.");
          return false;
        } else {
          var nuevaURL = "index.html"; 
          window.location.href = nuevaURL;
          return true;
        }
      }
    </script>
  </body>
</html>
