<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user-creator.css">
    <link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
    <title>Registrar</title>
    <?php
    require '../negocio/usuarioReglasNegocio.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $usuario = new usuarioReglasNegocio();
        $usuario->insertarUsuario($username, $password, $nombre, $apellidos, $email, $telefono);
        header('Location: inicioVista.php');
    }

    ?>
</head>

<body>
    <div class="register-container">
        <h2>Registro</h2>
        <form action="createUser.php" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Nombre de usuario" required autocomplete="off">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Contraseña" required autocomplete="off">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required autocomplete="off">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required autocomplete="off">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" placeholder="Número de teléfono" required autocomplete="off">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>