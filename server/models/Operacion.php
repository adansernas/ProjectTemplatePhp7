<?php

namespace models;

/**
 * Description of Operacion
 *
 * @author Adan Sernas
 */
class Operacion {

    private $idOperacion;

    function __construct() {
        
    }

    function getIdOperacion() {
        return $this->idOperacion;
    }

    function setIdOperacion($idOperacion) {
        $this->idOperacion = $idOperacion;
    }

}
