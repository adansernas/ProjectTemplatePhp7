<?php

namespace clases\utils;

use clases\db\Connection;

/**
 * Description of Service
 *
 * @author Adan Sernas
 */
class Service extends Component {

    function __construct(Connection $connection = null) {
        if ($connection === null) {
            $connection = new Connection();
        }

        parent::__construct($connection);
    }

}
