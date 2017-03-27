<?php

spl_autoload_register(function ($nameClass) {
    $filename = str_replace("\\", "/", $nameClass);
    $pathfile = "../server/$filename.php";
    if (!is_readable($pathfile)) {
        die('Class "' . $nameClass . '" not found.');
    }
    require $pathfile;
});

use controller\UsuariosController;

$controller = new UsuariosController();
$controller->listarUsuarios();
