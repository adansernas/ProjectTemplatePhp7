<?php

namespace models;

/**
 * Description of Usuario
 *
 * @author Adan Sernas
 */
class Usuario {

    private $idUsuario;

    function __construct() {
        
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

}
