<?php

namespace clases\utils;

use PDO;
use clases\db\Connection;
use clases\db\ConnectionFactory;

/**
 * Description of Component
 *
 * @author Adan Sernas
 */
class Component {

    protected $connection;

    function __construct(Connection $connection = null) {
        if ($connection === null) {
            $connection = ConnectionFactory::buildConnection();
        }

        $this->connection = $connection;
    }

    public function getConnection(): Connection {
        return $this->connection;
    }

    public function setConnection(Connection $connection) {
        $this->connection = $connection;
    }

    public function getPdo(): PDO {
        return $this->connection->getConnection();
    }

}
