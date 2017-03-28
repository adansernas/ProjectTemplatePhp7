<?php

namespace config;

use clases\db\Credencial;

/**
 * Description of Configuration
 *
 * @author Adan Sernas
 */
class Configuration {

    const PATH_FILE_INI = 'configuration.ini';

    public function __construct() {
        
    }

    public static function getCredencial($name = '') {
        $credencial = new Credencial();
        $configuration = parse_ini_file(self::PATH_FILE_INI, true);
        $databases = $configuration['database'];
        $database = array();
        if (empty($name)) {
            $database = $databases;
            if (array_key_exists('defecto', $databases)) {
                $database = $databases['defecto'];
            }
        } else {
            if (array_key_exists($name, $databases)) {
                $database = $databases[$name];
            } else {
                throw new NotFoundException("Configuracion $name no encontrada");
            }
        }

        $driver = $database['driver'];
        $host = $database['host'];
        $port = $database['port'];
        $dbname = $database['dbname'];
        $user = $database['user'];
        $pswd = $database['pswd'];

        $credencial->setDriver($driver)->setHost($host)->setPort($port)
                ->setDbname($dbname)->setUser($user)->setPswd($pswd);
        return $credencial;
    }

}
