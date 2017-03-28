<?php

namespace clases\http;

/**
 * Description of HttpResponse
 *
 * @author Adan Sernas
 */
class HttpResponse {

    const INIT = 'init';
    const PROCESS = 'process';
    const SUCCESS = 'ok';
    const FORBIDDEN = 'forbidden';
    const FAIL = 'fail';
    const ERROR = 'error';
    const NOT_FOUND = 'not-found';

    private $status;
    private $status2;
    private $message;

    function __construct() {
        $this->status = self::INIT;
        $this->status2 = false;
        $this->message = '';
        $this->valores = array();
        $this->out = array();
    }

    public function agregarValor($nombre, $valor) {
        $this->valores[$nombre] = $valor;
    }

    public function initValor($nombre, $valor) {
        $this->out[$nombre] = $valor;
    }

    public function out() {
        $this->out['status'] = $this->status;
        $this->out['status2'] = $this->status2;
        $this->out['message'] = $this->message;
        $this->out['valores'] = $this->valores;
        return $this->out;
    }

    public function doProcess($message = '') {
        $this->status = self::PROCESS;
        $this->message = (!empty($message) ? $message : 'Procesando peticion');
    }

    public function doSuccess($message = '') {
        $this->status = self::SUCCESS;
        $this->status2 = true;
        $this->message = (!empty($message) ? $message : 'Peticion atendida');
    }

    public function doForbidden($message = '') {
        $this->status = self::FORBIDDEN;
        $this->message = (!empty($message) ? $message : 'Acceso denegado');
    }

    public function doFail($message = '') {
        $this->status = self::FAIL;
        $this->message = (!empty($message) ? $message : 'Peticion fallida');
    }

    public function doError($message = '') {
        $this->status = self::ERROR;
        $this->message = (!empty($message) ? $message : 'Ocurrio un error');
    }

    public function doNotFound($message = '') {
        $this->status = self::NOT_FOUND;
        $this->message = (!empty($message) ? $message : 'Recurso no encontrado');
    }

}
