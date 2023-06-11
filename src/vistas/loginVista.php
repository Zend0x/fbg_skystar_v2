<!DOCTYPE html>
<html>

<head>
  <title>Página de Inicio de Sesión</title>
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="../../css/login.css">
  <?php
  $_badPass = false;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../negocio/usuarioReglasNegocio.php');
    $usuarioRN = new UsuarioReglasNegocio();
    $usuarioRN->login($_POST['username'], $_POST['password']);
    if ($usuarioRN->login($_POST['username'], $_POST['password'])) {
      session_start();
      $_SESSION['username'] = $_POST['username'];
      header('Location: inicioVista.php');
    } else {
      $_badPass = true;
    }
  }
  ?>
</head>

<body>
  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="loginVista.php" method="POST">
      <input type="text" placeholder="Usuario" name="username" autocomplete="off">
      <input type="password" placeholder="Contraseña" name="password" autocomplete="off">
      <input type="submit" value="Iniciar Sesión">
    </form>
    <p><a class="register-link" href="createUser.php">Registrar</a></p>
    <?php
    if ($_badPass) {
      echo "<p class='bad-pass'>Usuario o contraseña incorrectos</p>";
    }
    ?>
  </div>
</body>

</html>