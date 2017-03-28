<?php

use clases\http\HttpSession;

/**
 * Description of Index
 *
 * @author Adan Sernas
 */
class Index {

    function __construct() {
        
    }

    public function prepare() {
        error_reporting(E_ALL | E_STRICT);
        mb_internal_encoding('UTF-8');
        set_exception_handler(array($this, 'handleException'));
        spl_autoload_register(array($this, 'loadClass'));
        session_start();
    }

    public function runPage() {
        if (!array_key_exists('s3ss10n', $_SESSION)) {
            require_once('login.phtml');
            return;
        }
        
        $httpSession = new HttpSession(array());
        $httpSession = unserialize($_SESSION['s3ss10n']);

        $usuario = unserialize($httpSession->getAttr('usuario'));
        
        //echo '<pre>'; print_r($usuario);
        /*
          
          $menus = $sesion->getMenu();

          $page = $this->getPage($sesion);

          $filepage = $page['filepage'];
          $modulo = $page['modulo'];
          $operacion = $page['operacion'];
          $info = $page['info'];
          $controller = $page['controller'];

         */
          require_once('main.phtml');
    }

    public function getPage(Sesion $sesion) {
        $modulo = filter_input(INPUT_GET, 'modulo');
        $operacion = filter_input(INPUT_GET, 'operacion');

        if (empty($modulo)) {
            $modulo = 'dashboard';
        }

        if (empty($operacion)) {
            $operacion = 'dashboard';
        }

        if ($modulo != 'dashboard') {
            $filepage = "content/$modulo/$operacion/$operacion.view.php";
            $controller = "admin/content/$modulo/$operacion/$operacion.controller.js";
        } else {
            $filepage = "content/$modulo/$operacion.view.php";
            $controller = "admin/content/$modulo/$operacion.controller.js";
        }

        if (!is_readable($filepage)) {
            $filepage = "content/404_error.php";
        }

        $info = $sesion->obtenerOperacion($modulo, $operacion);

        return array('modulo' => $modulo,
            'operacion' => $operacion,
            'filepage' => $filepage,
            'info' => $info,
            'controller' => $controller
        );
    }

    public function handleException(Exception $ex) {
        $extra = array('message' => $ex->getMessage());
    }

    public function loadClass($nameClass) {
        $filename = str_replace("\\", "/", $nameClass);
        $pathfile = "server/$filename.php";
        if (!is_readable($pathfile)) {
            die('Class "' . $nameClass . '" not found.');
        }
        require $pathfile;
    }

}

$index = new Index();
$index->prepare();
$index->runPage();
