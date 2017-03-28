<?php

namespace clases\db;

/**
 * Description of Credencial
 *
 * @author Adan Sernas
 */
class Credencial {

    private $driver;
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pswd;
    private $extras;

    function __construct() {
        
    }

    public function getDriver() {
        return $this->driver;
    }

    public function getHost() {
        return $this->host;
    }

    public function getPort() {
        return $this->port;
    }

    public function getDbname() {
        return $this->dbname;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPswd() {
        return $this->pswd;
    }

    public function getExtras() {
        return $this->extras;
    }

    public function setDriver($driver) {
        $this->driver = $driver;
        return $this;
    }

    public function setHost($host) {
        $this->host = $host;
        return $this;
    }

    public function setPort($port) {
        $this->port = $port;
        return $this;
    }

    public function setDbname($dbname) {
        $this->dbname = $dbname;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    public function setPswd($pswd) {
        $this->pswd = $pswd;
        return $this;
    }

    public function setExtras($extras) {
        $this->extras = $extras;
        return $this;
    }

}
