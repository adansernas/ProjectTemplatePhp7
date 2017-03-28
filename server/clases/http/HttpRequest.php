<?php

namespace clases\http;

/**
 * Description of HttpRequest
 *
 * @author Adan Sernas
 */
class HttpRequest {

    private $parametros;

    function __construct($parametros) {
        $this->parametros = $parametros;
    }

    public function existeParametro($nombre) {
        return array_key_exists($nombre, $this->parametros);
    }

    public function obtenerParametro($nombre) {
        return $this->parametros[$nombre];
    }

    public function obtenerEntero($nombre) {
        return (int) $this->parametros[$nombre];
    }

    public function getParametros() {
        return $this->parametros;
    }

    public function setParametros($parametros) {
        $this->parametros = $parametros;
        return $this;
    }

}
