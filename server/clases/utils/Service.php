<?php

namespace clases\utils;

use clases\db\Connection;
use clases\db\ConnectionFactory;

/**
 * Description of Service
 *
 * @author Adan Sernas
 */
class Service extends Component {

    function __construct(Connection $connection = null) {
        if ($connection === null) {
            $connection = ConnectionFactory::buildConnection();
        }

        parent::__construct($connection);
    }

}
