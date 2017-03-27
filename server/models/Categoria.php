<?php

namespace models;

/**
 * Description of Categoria
 *
 * @author Adan Sernas
 */
class Categoria {

    private $idCategoria;

    function __construct() {
        
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

}
