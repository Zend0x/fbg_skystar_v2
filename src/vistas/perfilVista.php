<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Perfil</title>
    <link rel="shortcut icon" href="../../assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/perfil-user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <?php
    // if (!isset($_SESSION['usuario'])) {
    //     header("Location: loginVista.php");
    // }
    ?>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand"><a href="inicioVista.php"><img src="../../assets/skystar_airways.png" alt="" srcset=""></a></span>
            </div>
            <div class="navbar-right">
                <button class="login-button">Iniciar sesión</button>
            </div>
        </nav>
        <div class="content">
            <h1>Mi Perfil</h1>
            <div class="profile-info">
                <div class="info-group">
                    <span class="label">Nombre:</span>
                    <span class="value" id="nombre"></span>
                </div>
                <div class="info-group">
                    <span class="label">Apellidos:</span>
                    <span class="value" id="apellidos"></span>
                </div>
                <div class="info-group">
                    <span class="label">Teléfono:</span>
                    <span class="value" id="telefono"></span>
                </div>
            </div>
            <div id="reservas">
                <h2>Mis Reservas</h2>
                <!-- Aquí puedes mostrar las reservas del usuario -->
            </div>
        </div>
    </div>
</body>

</html>