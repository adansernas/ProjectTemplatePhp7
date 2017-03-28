<?php

namespace controller;

use Exception;
use clases\utils\Controller;
use service\UsuarioService;

/**
 * Description of UsuariosController
 *
 * @author Adan Sernas
 */
class UsuariosController extends Controller {

    public function listarUsuarios() {
        try {
            $this->getConnection()->connect();
            $service = new UsuarioService($this->getConnection());
            $service->listarUsuarios();
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }

}
