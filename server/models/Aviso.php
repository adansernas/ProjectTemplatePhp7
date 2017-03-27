<?php

namespace models;

/**
 * Description of Aviso
 *
 * @author Adan Sernas
 */
class Aviso {

    private $idAviso;

    function __construct() {
        
    }

    function getIdAviso() {
        return $this->idAviso;
    }

    function setIdAviso($idAviso) {
        $this->idAviso = $idAviso;
    }

}
