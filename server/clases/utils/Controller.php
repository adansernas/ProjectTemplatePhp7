<?php

namespace clases\utils;

use clases\db\Connection;

/**
 * Description of Controller
 *
 * @author Adan Sernas
 */
class Controller extends Component {

    function __construct(Connection $connection = null) {
        if ($connection === null) {
            $connection = new Connection();
        }

        parent::__construct($connection);
    }

}
