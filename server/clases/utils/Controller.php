<?php

namespace clases\utils;

use clases\db\Connection;
use clases\db\ConnectionFactory;
use clases\http\HttpSession;

/**
 * Description of Controller
 *
 * @author Adan Sernas
 */
class Controller extends Component {

    protected $httpSession;

    function __construct(Connection $connection = null) {
        if ($connection === null) {
            $connection = ConnectionFactory::buildConnection();
        }

        parent::__construct($connection);
    }

    public function getHttpSession(): HttpSession {
        $hs = new HttpSession($this->httpSession->getAttrs());
        return $hs;
    }

    public function setHttpSession(HttpSession $httpSession) {
        $this->httpSession = $httpSession;
    }

}
