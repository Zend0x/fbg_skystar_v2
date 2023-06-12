<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

require("../infraestructura/vuelosAccesoDatos.php");

class VuelosReglasNegocio
{
    private $_ID;
    private $_FLIGHTNUM;
    private $_DATE;
    private $_DEPARTURE;
    private $_ARRIVAL;
    private $_ROUTE;
    private $_DEPARTUREAPT;
    private $_ARRIVALAPT;
    private $_TOTALTIME;
    private $_CAPACITY;
    private $_BASEPRICE;

    function __construct()
    {
    }

    function init($id, $flightnumber, $date, $departure, $arrival, $route, $departureApt, $arrivalApt, $capacity, $basePrice)
    {
        $this->_ID = $id;
        $this->_FLIGHTNUM = $flightnumber;
        $this->_DATE = $date;
        $this->_DEPARTURE = $departure;
        $this->_ARRIVAL = $arrival;
        $this->_ROUTE = $route;
        $this->_DEPARTUREAPT = $departureApt;
        $this->_ARRIVALAPT = $arrivalApt;
        $this->_CAPACITY = $capacity;
        $this->_BASEPRICE = $basePrice;
    }
    function init_insert($flightnumber, $departure, $arrival, $route, $departureApt, $arrivalApt)
    {
        $this->_FLIGHTNUM = $flightnumber;
        $this->_DEPARTURE = $departure;
        $this->_ARRIVAL = $arrival;
        $this->_ROUTE = $route;
        $this->_DEPARTUREAPT = $departureApt;
        $this->_ARRIVALAPT = $arrivalApt;
    }
    function init_datos($flightNum, $date, $departure, $arrival, $aptDeparture, $aptArrival, $flightTime)
    {
        $this->_FLIGHTNUM = $flightNum;
        $this->_DATE = $date;
        $this->_DEPARTURE = $departure;
        $this->_ARRIVAL = $arrival;
        $this->_DEPARTUREAPT = $aptDeparture;
        $this->_ARRIVALAPT = $aptArrival;
        $this->_TOTALTIME = $flightTime;
    }
    function init_id($id)
    {
        $this->_ID = $id;
    }

    function getId()
    {
        return $this->_ID;
    }

    function getFlightNum()
    {
        return $this->_FLIGHTNUM;
    }
    function getDate()
    {
        return $this->_DATE;
    }
    function getDepartureTime()
    {
        return $this->_DEPARTURE;
    }
    function getArrivalTime()
    {
        return $this->_ARRIVAL;
    }
    function getRoute()
    {
        return $this->_ROUTE;
    }
    function getDeparture()
    {
        return $this->_DEPARTUREAPT;
    }
    function getArrival()
    {
        return $this->_ARRIVALAPT;
    }
    function getTotalFlightTime()
    {
        return $this->_TOTALTIME;
    }
    function getCapacity()
    {
        return $this->_CAPACITY;
    }
    function getBasePrice()
    {
        return $this->_BASEPRICE;
    }

    function obtener($origen, $destino, $fecha)
    {
        $vuelosDAL = new VuelosAccesoDatos();
        $rs = $vuelosDAL->buscarVuelos($origen, $destino, $fecha);
        $datosVuelos = array();
        foreach ($rs as $vuelo) {
            $vuelosBL = new VuelosReglasNegocio();
            $vuelosBL->init($vuelo['id'], $vuelo['date'], $vuelo['flightNum'], $vuelo['departure'], $vuelo['arrival'], $vuelo['route'], $vuelo['departureApt'], $vuelo['arrivalApt'], $vuelo['capacity'], $vuelo['basePrice']);
            array_push($datosVuelos, $vuelosBL);
        }
        return $datosVuelos;
    }

    function insertar($origen, $destino)
    {
        $vuelosDAL = new VuelosAccesoDatos();
        $rs = $vuelosDAL->insertarVuelos($origen, $destino);
        $datosVuelos = array();
        foreach ($rs as $vuelo) {
            $vuelosBL = new VuelosReglasNegocio();
            $vuelosBL->init_insert($vuelo['flightNum'], $vuelo['departure'], $vuelo['arrival'], $vuelo['route'], $vuelo['departureApt'], $vuelo['arrivalApt']);
            array_push($datosVuelos, $vuelosBL);
        }
        return $datosVuelos;
    }
    function buscarPorID($id)
    {
        $vuelosDAL = new VuelosAccesoDatos();
        $rs = $vuelosDAL->buscarPorID($id);
        $datosVuelos = array();
        foreach ($rs as $vuelo) {
            $vuelosBL = new VuelosReglasNegocio();
            $vuelosBL->init_datos($vuelo['flightNum'], $vuelo['date'], $vuelo['departure'], $vuelo['arrival'], $vuelo['departureApt'], $vuelo['arrivalApt'], $vuelo['flightDuration']);
            array_push($datosVuelos, $vuelosBL);
        }
        return $datosVuelos;
    }
}
