<?php

namespace service;

use PDO;
use Exception;
use exceptions\SelectException;
use exceptions\InsertException;
use exceptions\UpdateException;
use clases\utils\Service;

/**
 * Description of AutenticacionService
 *
 * @author Adan Sernas
 */
class AutenticacionService extends Service {

    public function validarCredenciales(string $cuenta, string $password) {
        try {
            $autenticacion = array('autorizado' => false, 'respuesta' => '', 'idUsuario' => 0);

            $sth = $this->getPdo()->prepare('SELECT u.idUsuario, u.cuenta, u.password
                    FROM sis_Usuario AS u 
                    WHERE u.cuenta = :cuenta');

            $sth->execute(array(':cuenta' => $cuenta));

            $registro = $sth->fetch(PDO::FETCH_ASSOC);

            if ($registro != null) {
                if (md5($password) === $registro['password']) {
                    $idUsuario = intval($registro['idUsuario']);

                    $autenticacion['idUsuario'] = $idUsuario;
                    $autenticacion['autorizado'] = true;
                    $autenticacion['respuesta'] = 'Acceso concedido';
                } else {
                    $autenticacion['respuesta'] = 'Password incorrecto';
                }
            } else {
                $autenticacion['respuesta'] = 'Usuario no encontrado';
            }
            return $autenticacion;
        } catch (Exception $ex) {
            throw new SelectException($ex->getMessage());
        }
    }

    public function registrarSesion(int $idUsuario, string $claveSesion): int {
        try {
            $sth = $this->connection->getConnection()->prepare('INSERT INTO sis_Sesion (claveSesion, idUsuario, fechaInicio, activa) '
                    . 'VALUES (:claveSesion, :idUsuario, NOW(), 1);');
            $sth->bindValue(':claveSesion', $claveSesion, PDO::PARAM_STR);
            $sth->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $sth->execute();

            $idSesion = $this->connection->getConnection()->lastInsertId();

            return $idSesion;
        } catch (Exception $ex) {
            throw new InsertException($ex->getMessage());
        }
    }

    public function terminarSesion(int $idSesion): bool {
        try {
            $sth = $this->connection->getConnection()->prepare('UPDATE sis_Sesion SET activa = 0 '
                    . 'WHERE idSesion = :idSesion');
            $sth->bindValue(':idSesion', $idSesion, PDO::PARAM_INT);
            $sth->execute();
            return true;
        } catch (Exception $ex) {
            throw new UpdateException($ex->getMessage());
        }
    }

}
