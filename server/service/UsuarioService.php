<?php

namespace service;

use Exception;
use exceptions\SelectException;
use exceptions\InsertException;
use exceptions\UpdateException;
use exceptions\DeleteException;
use clases\utils\Service;
use models\Usuario;

/**
 * Description of UsuarioService
 *
 * @author Adan Sernas
 */
class UsuarioService extends Service {

    public function listarUsuarios() {
        try {
            
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function obtenerUsuario(int $idUsuario, bool $formatoEntidad = false) {
        try {
            
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function guardarUsuario(Usuario $usuario): int {
        try {
            $idUsuario = 0;

            return $idUsuario;
        } catch (Exception $ex) {
            throw new InsertException($ex->getMessage());
        }
    }

    public function actualizarUsuario(Usuario $usuario): bool {
        try {

            return true;
        } catch (Exception $ex) {
            throw new UpdateException($ex->getMessage());
        }
    }

    public function eliminarUsuario(Usuario $usuario): bool {
        try {

            return true;
        } catch (Exception $ex) {
            throw new DeleteException($ex->getMessage());
        }
    }

}
