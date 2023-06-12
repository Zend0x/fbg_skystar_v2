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
    session_start();
    // if (!isset($_SESSION['usuario'])) {
    //     header("Location: loginVista.php");
    // }
    require("../negocio/reservasReglasNegocio.php");
    $reservation = new reservaReglasNegocio();
    $reservation->init_searchUser($_SESSION['username']);
    $reservationList = $reservation->getById();

    require("../negocio/usuarioReglasNegocio.php");
    $user = new usuarioReglasNegocio();
    $userInfo = $user->getUserInfo($_SESSION['username']);
    ?>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand"><a href="inicioVista.php"><img src="../../assets/skystar_airways.png" alt="" srcset=""></a></span>
            </div>
            <div class="navbar-right">
                <?php
                if (!$_SESSION['username']) {
                    echo '<button class="login-button"><a href="loginVista.php" class="log-in">Iniciar sesión</a></button>';
                } else if ($_SESSION['username']) {
                    echo '<p>Bienvenido, <a href="perfilVista.php">' . $_SESSION['username'] . '</a></p>';
                    echo '<A href="logoutVista.php" class="log-out">Cerrar sesión</A>';
                }
                ?>
            </div>
        </nav>
        <div class="content">
            <h1>Mi Perfil</h1>
            <div class="profile-info">
                <div class="info-group">
                    <span class="label">Nombre:</span>
                    <span class="value" id="nombre"><?php echo $userInfo['name']; ?></span>
                </div>
                <div class="info-group">
                    <span class="label">Apellidos:</span>
                    <span class="value" id="apellidos"><?php echo $userInfo['surnames']; ?></span>
                </div>
                <div class="info-group">
                    <span class="label">Teléfono:</span>
                    <span class="value" id="telefono"><?php echo $userInfo['phoneNum']; ?></span>
                </div>
            </div>
            <div id="reservas">
                <h2>Mis Reservas</h2>
                <?php
                // foreach of $reservationList, print each format in a card list
                foreach ($reservationList as $reservation) {
                    echo '<div class="card">
                    <div class="card-header">
                        <span class="flight-number">' . $reservation['flightNumber'] . '</span>
                        <span class="flight-date">' . $reservation['date'] . '</span>
                    </div>
                    <div class="card-body">
                        <div class="flight-info">
                            <span class="flight-origin">' . $reservation['origin_airport'] . '</span> →
                            <span class="flight-destination">' . $reservation['destination_airport'] . '</span>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>