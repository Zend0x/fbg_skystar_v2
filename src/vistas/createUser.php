<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user-creator.css">
    <title>Registrar</title>
    <?php
    require_once '../negocio/usuarioReglasNegocio.php';
    ?>
</head>

<body>
    <div class="register-container">
        <h2>Registro</h2>
        <form action="createUser.php" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Nombre de usuario" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" placeholder="Número de teléfono" required>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>