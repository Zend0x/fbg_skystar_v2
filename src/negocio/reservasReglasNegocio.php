<?php

ini_set('display_errors', 1);
ini_set('html_errors', 1);

require("../infraestructura/reservasAccesoDatos.php");

class reservaReglasNegocio
{
    private $_ID;
    private $_FLIGHTID;
    private $_USERNAME;
    private $_DATE;
    private $_PRICE;

    function __construct()
    {
    }
    function init($id_vuelo, $id_usuario, $fecha, $precio)
    {
        $this->_FLIGHTID = $id_vuelo;
        $this->_USERNAME = $id_usuario;
        $this->_DATE = $fecha;
        $this->_PRICE = $precio;
    }
    function init_search($id)
    {
        $this->_ID = $id;
    }
    function init_searchUser($user)
    {
        $this->_USERNAME = $user;
    }
    function getFlightID()
    {
        return $this->_FLIGHTID;
    }
    function getUserID()
    {
        return $this->_USERNAME;
    }
    function getDate()
    {
        return $this->_DATE;
    }
    function getPrice()
    {
        return $this->_PRICE;
    }

    function insertar()
    {
        $reservasDAL = new reservasAccesoDatos();
        $rs = $reservasDAL->insertar($this->_FLIGHTID, $this->_USERNAME, $this->_DATE, $this->_PRICE);
        return $rs;
    }
    function getById()
    {
        $reservasDAL = new reservasAccesoDatos();
        $rs = $reservasDAL->getById($this->_USERNAME);
        return $rs;
    }
}
