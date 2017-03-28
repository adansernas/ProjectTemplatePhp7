<?php

spl_autoload_register(function ($nameClass) {
    $filename = str_replace("\\", "/", $nameClass);
    $pathfile = "$filename.php";
    if (!is_readable($pathfile)) {
        die('Class "' . $nameClass . '" not found.');
    }
    require $pathfile;
});
