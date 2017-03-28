<?php

namespace models;

/**
 * Description of Sesion
 *
 * @author Adan Sernas
 */
class Sesion {

    private $idSesion;
    private $claveSesion;
    private $idUsuario;
    private $fechaInicio;
    private $activa;

    function __construct() {
        
    }

    function getIdSesion() {
        return $this->idSesion;
    }

    function getClaveSesion() {
        return $this->claveSesion;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getActiva() {
        return $this->activa;
    }

    function setIdSesion($idSesion) {
        $this->idSesion = $idSesion;
    }

    function setClaveSesion($claveSesion) {
        $this->claveSesion = $claveSesion;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setActiva($activa) {
        $this->activa = $activa;
    }

}
