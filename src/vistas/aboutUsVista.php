<!DOCTYPE html>
<html>

<head>
    <title>Sobre nosotros - Aerolínea</title>
    <link rel="stylesheet" href="../../css/about-us.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">

        <nav class="navbar">
            <div class="navbar-center">
                <span class="navbar-brand"><a href="inicioVista.php"><img src="../../assets/skystar_airways.png" alt="" srcset=""></a></span>
            </div>
            <div class="navbar-right">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '<button class="login-button"><a href="loginVista.php" class="log-in">Iniciar sesión</a></button>';
                } else if ($_SESSION['username']) {
                    echo '<p>Bienvenido, <a href="perfilVista.php" class="log-in">' . $_SESSION['username'] . '</a></p>';
                    echo '<A href="logoutVista.php" class="log-out">Cerrar sesión</A>';
                }
                ?>
            </div>
        </nav>
        <div class="content">
            <h1>Sobre nosotros</h1>

            <div class="logo">
                <img src="../../assets/skystar_airways.png" alt="Logo de la aerolínea">
            </div>

            <p>
                SkyStar Airways nace en el año 2023 en la ciudad de Palma de Mallorca.
            </p>
            <p>¿Nuestra misión? Llevarte volando por las estrellas.</p>
            <p>
                ¿Nuestro objetivo? Abrir el cielo a todos los viajeros, sin importar su presupuesto.
            </p>
            <p>
                Con Skystar Airways, puedes elegir entre una amplia selección de destinos en Europa y Asia. ¿Siempre soñaste con perderte en las calles de Hong Kong, repletas de neones? ¿O tal vez deseas explorar la tecnológica e imponente ciudad de Frankfurt, corazón económico de Europa? No importa cuál sea tu destino preferido, nuestra aerolínea te llevará allí de manera segura y sin complicaciones.
            </p>
            <p>Además, entendemos la importancia de la comodidad y la conveniencia durante tu viaje. Por eso, ofrecemos servicios adicionales opcionales, como selección de asientos, servicio de comidas y snacks a bordo, así como opciones de equipaje flexibles, para adaptarnos a tus necesidades individuales.
            </p>
            <p>En Skystar Airways, estamos comprometidos con la excelencia y nos esforzamos por brindarte una experiencia de viaje excepcional desde el momento en que reservas tu vuelo hasta que aterrizas en tu destino final. Confía en nosotros para hacer realidad tus sueños de viaje y permítenos llevarte a nuevos destinos emocionantes en Europa y Asia.
            </p>
            <p>¡Gracias por elegir Skystar Airways! Esperamos poder darte la bienvenida a bordo muy pronto y ser parte de tu próxima aventura inolvidable.
            </p>
        </div>
        <section class="information-section">
            <div class="information-container">
                <div class="information-column">
                    <h4>La compañía</h4>
                    <p><a class="information-link" href="flotaVista.php">Flota</a></p>
                    <p>Compromiso</p>
                    <p>Empleo</p>
                </div>
                <div class="information-column">
                    <h4><a class="information-link" href="aboutUsVista.php">Sobre Nosotros</a></h4>
                    <p><a class="information-link" href="aboutUsVista.php">Conoce más sobre nuestra aerolínea y nuestra historia.</a></p>
                </div>
                <div class="information-column">
                    <h4>Contacto</h4>
                    <p>Atención al cliente: 971 700 960
                        <br>
                        Email: soporte@skystar.mo</a>
                    </p>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer-content">
                <img src="../../assets/skystar_airways.png" alt="Logo de la compañía">
                <p>SkyStar Airways - Copyright Fernando Buendía Galindo 2023</p>
            </div>

        </footer>
    </div>
</body>

</html>