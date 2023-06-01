<!DOCTYPE html>
<html>

<head>
  <title>Página de Inicio de Sesión</title>
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" type="text/css" href="../../css/login.css">
  <?php
  // if request type is post, it will check if the user exists in the database using the function "login()" frp, the usuarioReglasNegocio.php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../reglasNegocio/usuarioReglasNegocio.php';
    $usuarioRN = new UsuarioReglasNegocio();
    $usuarioRN->login($_POST['username'], $_POST['password']);
  }
  ?>
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