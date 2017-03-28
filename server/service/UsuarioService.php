<?php

namespace service;

use PDO;
use Exception;
use exceptions\SelectException;
use exceptions\InsertException;
use exceptions\UpdateException;
use exceptions\DeleteException;
use clases\utils\Service;
use models\Usuario;
use clases\utils\Utils;

/**
 * Description of UsuarioService
 *
 * @author Adan Sernas
 */
class UsuarioService extends Service {

    public function listarUsuarios() {
        try {
            $sth = $this->getPdo()->prepare('SELECT u.idUsuario, u.cuenta, u.password
                    FROM sis_Usuario AS u');
            $sth->execute();

            $registros = $sth->fetchAll(PDO::FETCH_ASSOC);
            print_r($registros);
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function obtenerUsuario(int $idUsuario, bool $formatoEntidad = false) {
        try {
            $sth = $this->getPdo()->prepare('SELECT u.idUsuario, u.cuenta, u.password, 
                        u.nombre, u.apPaterno, u.apMaterno, u.correo, u.sexo, 
                        u.idArea, a.area, u.idRolUsuario, r.rolUsuario, 
                        u.idEstadoUsuario, eu.estadoUsuario 
                    FROM sis_Usuario AS u 
                        LEFT JOIN cat_Area AS a ON u.idArea = a.idArea 
                        JOIN cat_RolUsuario AS r ON u.idRolUsuario = r.idRolUsuario
                        JOIN cat_EstadoUsuario AS eu ON u.idEstadoUsuario = eu.idEstadoUsuario
                    WHERE u.idUsuario = :idUsuario');
            $sth->execute(array(':idUsuario' => $idUsuario));
            $registro = $sth->fetch(PDO::FETCH_ASSOC);
            if ($formatoEntidad) {
                $usuario = Utils::rellenarObjecto(new Usuario(), $registro);
                return $usuario;
            }
            return $registro;
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
