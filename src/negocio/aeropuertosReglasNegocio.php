<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

require("../infraestructura/aeropuertosAccesoDatos.php");

class AeropuertosReglasNegocio{
    private $_ICAO;

    function __construct(){
    }

    function init($icao){
        $this->_ICAO=$icao;
    }

    function getICAO(){
        return $this->_ICAO;
    }

    function obtener(){
        $aeropuertosDAL=new AeropuertosAccesoDatos();
        $rs=$aeropuertosDAL->getAeropuertos();
        $datosAeropuertos=array();
        foreach($rs as $aeropuerto){
            $aeropuertosBL=new AeropuertosReglasNegocio();
            $aeropuertosBL->init($aeropuerto['icao']);
            array_push($datosAeropuertos,$aeropuertosBL);
        }
        return $datosAeropuertos;
    }
}