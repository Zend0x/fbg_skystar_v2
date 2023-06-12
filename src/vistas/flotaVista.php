<!DOCTYPE html>
<html>

<head>
    <title>Flota de Aviones</title>
    <link rel="stylesheet" href="../../css/fleet.css">
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
                    echo '<p>Bienvenido, <a href="perfilVista.php">' . $_SESSION['username'] . '</a></p>';
                    echo '<A href="logoutVista.php" class="log-out">Cerrar sesión</A>';
                }
                ?>
            </div>
        </nav>
        <h1 class="our-fleet">Nuestra flota</h1>
        <div class="content">
            <div class="card">
                <div class="card-image">
                    <img src="../../assets/allwhite_a320.jpg" alt="ec-skt">
                </div>
                <div class="card-content">
                    <h2>EC-SKT, el pionero</h2>
                    <p>
                        El avión A320ceo, registrado bajo el código EC-SKT, es una joya de la aviación que ha dejado su huella en la historia de nuestra compañía. Con su diseño aerodinámico y rendimiento excepcional, el EC-SKT ha sido un fiel compañero en innumerables aventuras aéreas.
                        <br>
                        Este magnífico avión fue el primer avión en unirse a nuestra flota, marcando un hito emocionante en nuestro crecimiento como aerolínea. Desde su introducción, el EC-SKT ha sido testigo de innumerables despegues y aterrizajes, llevando a nuestros pasajeros a destinos en todo el mundo.
                        <br>
                        A pesar de no estar equipado con sharklets, el EC-SKT brinda una experiencia de vuelo suave, confortable y eficiente. Su interior moderno y elegante ha sido diseñado para brindar la máxima comodidad a nuestros pasajeros, con asientos espaciosos y una cabina bien iluminada. Cada detalle del avión ha sido cuidadosamente pensado para garantizar una experiencia de vuelo inolvidable.
                        <br>
                        Este avión, con su distintiva librea y el orgulloso logo de nuestra aerolínea, ha sido un embajador confiable de nuestra marca. Sus motores potentes y eficientes han llevado a cabo numerosas travesías sin problemas, permitiendo a nuestros pilotos alcanzar velocidades impresionantes y mantener vuelos puntuales.
                        <br>
                        El EC-SKT ha formado parte de muchas historias emocionantes, desde llevar a pasajeros en su primer viaje en avión hasta transportar a viajeros experimentados en sus viajes de negocios y vacaciones soñadas. Este avión ha sido testigo de risas, conversaciones, reencuentros y despedidas, creando recuerdos que perdurarán en el tiempo.
                        <br>
                        A medida que nuestra flota continúa creciendo, el EC-SKT sigue siendo un símbolo de nuestros humildes comienzos y del compromiso con la excelencia en el servicio. Es un recordatorio constante de nuestro legado y de la pasión por conectar personas y lugares.
                        <br>
                        El avión EC-SKT ha dejado una marca imborrable en nuestra compañía y en la industria de la aviación en general. A través de su presencia en el cielo y su espíritu de aventura, este avión ha inspirado a generaciones de viajeros y ha sido parte de una historia que sigue evolucionando. ¡Vuela alto, EC-SKT, y que tus alas sigan llevándonos hacia nuevos horizontes!
                    </p>
                    <div class="seatmap">
                        <img src="../../assets/a320_seatmap.jpg" alt="a320_seats">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-image-a350">
                    <img src="../../assets/allwhite_A350.webp" alt="EC-SKS">
                </div>
                <div class="card-content">
                    <h2>EC-SKS, el orgullo de la compañía</h2>
                    <p>
                        El avión A350, registrado bajo el código EC-SKS, es una maravilla de la ingeniería aeroespacial que ha revolucionado la experiencia de vuelo en nuestra compañía. Este elegante y moderno avión ha llevado la excelencia y el confort a nuevas alturas, cautivando a nuestros pasajeros desde el momento en que suben a bordo.
                        <br>
                        El EC-SKS se ha ganado un lugar destacado en nuestra flota como un símbolo de innovación y vanguardia. Este avión de última generación ha sido equipado con las últimas tecnologías y características de diseño, brindando una experiencia de vuelo sin precedentes tanto para los viajeros de negocios como para aquellos que buscan un viaje relajante.
                        <br>
                        Con su distintiva librea y líneas aerodinámicas, el EC-SKS ha dejado una impresión duradera en los cielos y en la industria de la aviación. Este avión ha sido aclamado por su eficiencia energética y sostenibilidad, ofreciendo un menor consumo de combustible y una reducción significativa en las emisiones de carbono.
                        <br>
                        Dentro de la cabina del EC-SKS, los pasajeros son recibidos con un ambiente sofisticado y lujoso. Los asientos ergonómicos, amplios y cómodos permiten un viaje placentero, mientras que las ventanas panorámicas ofrecen vistas impresionantes del mundo exterior. El diseño interior ha sido cuidadosamente planificado para maximizar el espacio y proporcionar una sensación de amplitud.
                        <br>
                        El EC-SKS cuenta con tecnología de última generación, como sistemas de entretenimiento a bordo de vanguardia y conectividad WiFi, que mantienen a nuestros pasajeros conectados y entretenidos durante todo el vuelo. Además, la avanzada aviónica y los sistemas de navegación del A350 garantizan una travesía suave y segura en todos los aspectos.
                        <br>
                        Este avión representa un hito en la historia de nuestra aerolínea, ya que fue el primero de su tipo en unirse a nuestra flota. Desde ese momento, el EC-SKS ha sido testigo de innumerables momentos memorables, desde vuelos inaugurales hasta viajes inolvidables que han llevado a nuestros pasajeros a destinos de ensueño.
                        <br>
                        A medida que miramos hacia el futuro, el EC-SKS continúa siendo un símbolo de nuestra dedicación a ofrecer una experiencia de vuelo excepcional. Este avión emblemático seguirá siendo un elemento fundamental de nuestra flota, llevando nuestros valores y compromiso con la calidad a nuevas alturas.
                        <br>
                        El avión EC-SKS, con su elegancia y rendimiento sobresaliente, ha dejado una huella imborrable en nuestra compañía y en los corazones de aquellos que han tenido el privilegio de volar en él.
                        <br>
                        ¡Que el EC-SKS siga volando alto y transportando a nuestros pasajeros hacia un futuro lleno de aventuras y descubrimientos!
                    </p>
                    <div class="seatmap">
                        <img src="../../assets/a350_seatmap.jpg" alt="a320_seats">
                    </div>
                </div>
            </div>
        </div>
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
                <h4><a class="information-link" href="contactoVista.php">Contacto</a></h4>
                <p><a class="information-link" href="contactoVista.php">Encuentra nuestras formas de contacto y atención al cliente.</a></p>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <img src="../../assets/skystar_airways.png" alt="Logo de la compañía">
            <p>SkyStar Airways - Copyright Fernando Buendía Galindo 2023</p>
        </div>

    </footer>
</body>

</html>