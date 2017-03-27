<?php

namespace service;

use Exception;
use exceptions\SelectException;
use exceptions\InsertException;
use exceptions\UpdateException;
use exceptions\DeleteException;
use clases\utils\Service;
use models\Aviso;

/**
 * Description of AvisoService
 *
 * @author Adan Sernas
 */
class AvisoService extends Service {

    public function listarAvisos() {
        try {
            
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function obtenerAviso(int $idAviso, bool $formatoEntidad = false) {
        try {
            
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function guardarAviso(Aviso $aviso): int {
        try {
            
        } catch (Exception $ex) {
            throw new InsertException($ex->getMessage());
        }
    }

    public function actualizarAviso(Aviso $aviso): bool {
        try {

            return true;
        } catch (Exception $ex) {
            throw new UpdateException($ex->getMessage());
        }
    }

    public function eliminarAviso(Aviso $aviso): bool {
        try {

            return true;
        } catch (Exception $ex) {
            throw new DeleteException($ex->getMessage());
        }
    }

}
