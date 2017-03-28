<?php

spl_autoload_register(function ($nameClass) {
    $filename = str_replace("\\", "/", $nameClass);
    $pathfile = "../server/$filename.php";
    if (!is_readable($pathfile)) {
        die('Class "' . $nameClass . '" not found.');
    }
    require $pathfile;
});

use controller\AutenticacionController;
use clases\http\HttpRequest;
use clases\http\HttpResponse;

$httpRequest = new HttpRequest(array('cuenta' => 'ADMINISTRADOR', 'password' => 'ADMINISTRADOR'));
$httpResponse = new HttpResponse();
$httpResponse->doProcess('procesando');

$controller = new AutenticacionController();
$validacion = $controller->autenticarUsuario($httpRequest, $httpResponse);
echo '<pre>';
print_r($validacion->out());
