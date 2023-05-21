    <?php
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        require("../negocio/vuelosReglasNegocio.php");

        $vuelosBL=new VuelosReglasNegocio();
        $datosVuelos=$vuelosBL->obtener($_POST['dep_apt'],$_POST['arr_apt']);

        foreach($datosVuelos as $vuelo){
            echo $vuelo->getFlightNum()."<br>".$vuelo->getDeparture()."<br>";
        }
    ?>