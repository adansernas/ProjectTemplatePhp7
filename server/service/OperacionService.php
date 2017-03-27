<?php

namespace service;

use Exception;
use exceptions\SelectException;
use exceptions\InsertException;
use exceptions\UpdateException;
use exceptions\DeleteException;
use clases\utils\Service;
use models\Operacion;

/**
 * Description of OperacionService
 *
 * @author Adan Sernas
 */
class OperacionService extends Service {

    public function obtenerOperacion(int $idOperacion) {
        try {
            
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function guardarOperacion(Operacion $operacion, bool $formatoEntidad = false): int {
        try {
            $idOperacion = 0;

            return $idOperacion;
        } catch (Exception $ex) {
            throw new InsertException($ex->getMessage());
        }
    }

    public function actualizarOperacion(Operacion $operacion): bool {
        try {

            return true;
        } catch (Exception $ex) {
            throw new UpdateException($ex->getMessage());
        }
    }

    public function eliminarOperacion(Operacion $operacion): bool {
        try {

            return true;
        } catch (Exception $ex) {
            throw new DeleteException($ex->getMessage());
        }
    }

}
