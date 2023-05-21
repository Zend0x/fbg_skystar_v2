<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

require("../infraestructura/vuelosAccesoDatos.php");

class VuelosReglasNegocio{
    private $_FLIGHTNUM;
    private $_DEPARTURE;
    private $_ROUTE;
    private $_DEPARTUREAPT;
    private $_ARRIVALAPT;

    function __construct(){
    }

    function init($flightnumber,$departure,$route,$departureApt,$arrivalApt){
        $this->_FLIGHTNUM=$flightnumber;
        $this->_DEPARTURE=$departure;
        $this->_ROUTE=$route;
        $this->_DEPARTUREAPT=$departureApt;
        $this->_ARRIVALAPT=$arrivalApt;
    }

    function getFlightNum(){
        return $this->_FLIGHTNUM;
    }
    function getDepartureTime(){
        return $this->_DEPARTURE;
    }
    function getRoute(){
        return $this->_ROUTE;
    }
    function getDeparture(){
        return $this->_DEPARTUREAPT;
    }
    function getArrival(){
        return $this->_ARRIVALAPT;
    }

    function obtener($origen,$destino){
        $vuelosDAL=new VuelosAccesoDatos();
        $rs=$vuelosDAL->buscarVuelos($origen,$destino);
        $datosVuelos=array();
        foreach($rs as $vuelo){
            $vuelosBL=new VuelosReglasNegocio();
            $vuelosBL->init($vuelo['flightNum'],$vuelo['departure'],$vuelo['route'],$vuelo['departureApt'],$vuelo['arrivalApt']);
            array_push($datosVuelos,$vuelosBL);
        }
        return $datosVuelos;
    }
}