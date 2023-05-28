<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("../negocio/usuarioReglasNegocio.php");
    ?>
    <!-- Un form de HTML que envie a createUser.php con POST para introducir datos de un usuario (username, nombre, apellidos, email, teléfono) -->
    <form action="createUser.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>