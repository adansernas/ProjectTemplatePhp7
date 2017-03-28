<?php

namespace clases\utils;

use ReflectionClass;
use ReflectionProperty;

/**
 * Description of Utils
 *
 * @author Adan Sernas
 */
class Utils {

    public static function randomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function rellenarObjecto($objecto, $parametros, $sanear = true) {
        $reflect = new ReflectionClass($objecto);
        $propiedades = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
        foreach ($propiedades as $propiedad) {
            $nombrePropiedad = $propiedad->getName();
            if (array_key_exists($nombrePropiedad, $parametros)) {
                $valor = $parametros[$nombrePropiedad];

                if ($sanear) {
                    $valor = Utils::sanearValor($valor);
                }

                $propiedad->setAccessible(true);
                $propiedad->setValue($objecto, $valor);
            }
        }
        return $objecto;
    }

    public static function sanearValor($valor) {
        $valor = trim($valor);
        #Reemplazar multiples espacios por uno solo
        $valor = preg_replace('/\s+/', ' ', $valor);
        #Reemplazar saltos de linea
        $valor = preg_replace('/^[ \s\0\x0B]+|[ \s\0\x0B]+$/m', '', $valor);
        $valor = trim($valor);

        return $valor;
    }

}
