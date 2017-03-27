<?php

namespace service;

use Exception;
use exceptions\SelectException;
use exceptions\InsertException;
use exceptions\UpdateException;
use exceptions\DeleteException;
use clases\utils\Service;
use models\Categoria;

/**
 * Description of CategoriaService
 *
 * @author Adan Sernas
 */
class CategoriaService extends Service {

    public function listarCategorias() {
        try {
            
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function obtenerCategoria(int $idCategoria, bool $formatoEntidad = false) {
        try {
            
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function guardarCategoria(Categoria $categoria): int {
        try {
            $idCategoria = 0;

            return $idCategoria;
        } catch (Exception $ex) {
            throw new InsertException($ex->getMessage());
        }
    }

    public function actualizarCategoria(Categoria $categoria): bool {
        try {
            
            return true;
        } catch (Exception $ex) {
            throw new UpdateException($ex->getMessage());
        }
    }

    public function eliminarCategoria(Categoria $categoria): bool {
        try {
            
            return true;
        } catch (Exception $ex) {
            throw new DeleteException($ex->getMessage());
        }
    }

}
