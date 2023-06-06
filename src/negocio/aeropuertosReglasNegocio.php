<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

require("../infraestructura/aeropuertosAccesoDatos.php");

class AeropuertosReglasNegocio
{
    private $_ICAO;
    private $_NAME;
    private $_CITY;
    private $_COUNTRY;

    function __construct()
    {
    }

    function init($icao)
    {
        $this->_ICAO = $icao;
    }
    function fullInit($icao, $name, $city, $country)
    {
        $this->_ICAO = $icao;
        $this->_NAME = $name;
        $this->_CITY = $city;
        $this->_COUNTRY = $country;
    }

    function getICAO()
    {
        return $this->_ICAO;
    }
    function getName()
    {
        return $this->_NAME;
    }
    function getCity()
    {
        return $this->_CITY;
    }
    function getCountry()
    {
        return $this->_COUNTRY;
    }

    function obtener()
    {
        $aeropuertosDAL = new AeropuertosAccesoDatos();
        $rs = $aeropuertosDAL->getAeropuertos();
        $datosAeropuertos = array();
        foreach ($rs as $aeropuerto) {
            $aeropuertosBL = new AeropuertosReglasNegocio();
            $aeropuertosBL->init($aeropuerto['icao']);
            array_push($datosAeropuertos, $aeropuertosBL);
        }
        return $datosAeropuertos;
    }

    function buscarAeropuerto($ICAO)
    {
        $aeropuertosDAL = new AeropuertosAccesoDatos();
        $rs = $aeropuertosDAL->buscarAeropuerto($ICAO);
        $datosAeropuertos = array();
        foreach ($rs as $aeropuerto) {
            $aeropuertosBL = new AeropuertosReglasNegocio();
            $aeropuertosBL->fullInit($aeropuerto['icao'], $aeropuerto['name'], $aeropuerto['city'], $aeropuerto['country']);
            array_push($datosAeropuertos, $aeropuertosBL);
        }
        return $datosAeropuertos;
    }
}
