<?php

    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    require("../negocio/aeropuertosReglasNegocio.php");

    $aeropuertoBL=new AeropuertosReglasNegocio();
    $datosAeropuertos=$aeropuertoBL->obtener();

    foreach($datosAeropuertos as $aeropuerto){
        echo '<p>'.$aeropuerto->getICAO().'</p>';
    }

?>