<?php

namespace clases\db;

use PDO;
use PDOException;
use Exception;
use clases\db\Credencial;

/**
 * Description of Connection
 *
 * @author Adan Sernas
 */
class Connection {

    private $credencial;
    private $connection;
    private $connected;
    private $inTransaction;
    private $forceTransaction;

    public function __construct(Credencial $credencial) {
        $this->credencial = $credencial;
        $this->forceTransaction = true;
    }

    public function connect(): bool {
        if (!$this->connected) {
            try {
                $driver = $this->credencial->getDriver();
                $host = $this->credencial->getHost();
                $port = $this->credencial->getPort();
                $dbname = $this->credencial->getDbname();
                $user = $this->credencial->getUser();
                $pswd = $this->credencial->getPswd();

                $connectionString = "$driver:host=$host;port=$port;dbname=$dbname";
                $conn = new PDO($connectionString, $user, $pswd);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec('SET CHARACTER SET utf8');

                $this->connection = $conn;
                $this->connected = true;
                $this->inTransaction = false;
                return true;
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            throw new Exception('La conexion ya esta abierta');
        }
    }

    public function isConnected() {
        return $this->connected;
    }

    public function disconnect() {
        if ($this->connected) {
            $this->connection = null;
            $this->inTransaction = false;
            $this->connected = false;
        }
    }

    public function begin() {
        if ($this->connected) {
            $this->connection->beginTransaction();
            $this->inTransaction = true;
        } else {
            throw new Exception('No hay una conexion abierta');
        }
    }

    public function commit() {
        if ($this->connected) {
            $this->connection->commit();
            $this->inTransaction = false;
        } else {
            throw new Exception('No hay una conexion abierta');
        }
    }

    public function rollback() {
        if ($this->connected) {
            $this->connection->rollBack();
            $this->inTransaction = false;
        } else {
            
        }
    }

    public function insert($query) {
        if ($this->connected) {
            if ($this->forceTransaction && !$this->inTransaction) {
                // No ha iniciado una transaccion
                return;
            }
            $this->connection->exec($query);
            return $this->connection->lastInsertId();
        } else {
            throw new Exception('No hay una conexion abierta');
        }
    }

    public function execute($query) {
        if ($this->connected) {
            if ($this->forceTransaction && !$this->inTransaction) {
                // No ha iniciado una transaccion
                return;
            }
            return $this->connection->exec($query);
        } else {
            throw new Exception('No hay una conexion abierta');
        }
    }

    public function query($query) {
        if ($this->connected) {
            $result = $this->connection->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception('No hay una conexion abierta');
        }
    }

    public function getConnection(): PDO {
        return $this->connection;
    }

}
