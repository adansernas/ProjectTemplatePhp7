<?php

namespace clases\utils;
use clases\db\Connection;
/**
 * Description of Component
 *
 * @author Adan Sernas
 */
class Component {

    protected $connection;

    function __construct(Connection $connection = null) {
        if ($connection === null) {
            $connection = new Connection();
        }

        $this->connection = $connection;
    }

    function getConnection(): Connection {
        return $this->connection;
    }

    function setConnection(Connection $connection) {
        $this->connection = $connection;
    }

}
