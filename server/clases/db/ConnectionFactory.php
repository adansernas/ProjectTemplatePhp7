<?php

namespace clases\db;

use config\Configuration;
use clases\db\Connection;

/**
 * Description of ConnectionFactory
 *
 * @author Adan Sernas
 */
class ConnectionFactory {

    public static function buildConnection($name = '') {
        $credencial = Configuration::getCredencial($name);
        $connection = new Connection($credencial);

        return $connection;
    }

}
