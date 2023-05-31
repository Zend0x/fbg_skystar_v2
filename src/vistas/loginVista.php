<!DOCTYPE html>
<html>

<head>
  <title>Página de Inicio de Sesión</title>
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" type="text/css" href="../../css/login.css">
</head>

<body>
  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="loginVista.php" method="$_POST">
      <input type="text" placeholder="Usuario">
      <input type="password" placeholder="Contraseña">
      <input type="submit" value="Iniciar Sesión">
    </form>
    <p><a class="register-link" href="createUser.php">Registrar</a></p>
  </div>
</body>

</html>