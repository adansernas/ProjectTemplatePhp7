<?php

error_reporting(E_ALL | E_STRICT);
mb_internal_encoding('UTF-8');
date_default_timezone_set('America/Mexico_City');
session_start();

require 'classLoader.php';

use clases\http\HttpResponse;
use clases\http\HttpRequest;
use clases\http\HttpSession;

$httpResponse = new HttpResponse();
try {

    $url = filter_input(INPUT_GET, 'url');

    $parts = explode('/', $url);

    $nameMethod = array_pop($parts);
    $nameClass = 'controller\\' . implode('\\', $parts) . 'Controller';

    $filename = str_replace('\\', '/', $nameClass);
    $pathfile = "$filename.php";
    
    if (is_readable($pathfile)) {
        $httpResponse->doProcess();

        $httpRequest = new HttpRequest($_REQUEST);
        if (isset($_SESSION['s3ss10n'])) {
            $httpSession = unserialize($_SESSION['s3ss10n']);
        } else {
            $httpSession = new HttpSession(array());
        }

        $instance = new $nameClass();
        $instance->setHttpSession($httpSession);
        $httpResponse = $instance->$nameMethod($httpRequest, $httpResponse);
    } else {
        throw new Exception("Clase $nameClass no encontrada");
    }
} catch (Exception $ex) {
    $httpResponse->doError($ex->getTraceAsString());
} finally {
    echo(json_encode($httpResponse->out()));
}