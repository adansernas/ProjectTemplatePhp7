<?php

namespace controller;

use clases\utils\Controller;
use clases\http\HttpRequest;
use clases\http\HttpResponse;
use clases\http\HttpSession;
use service\AutenticacionService;
use service\UsuarioService;
use clases\utils\Utils;

/**
 * Description of AutenticacionController
 *
 * @author Adan Sernas
 */
class AutenticacionController extends Controller {

    public function autenticarUsuario(HttpRequest $request, HttpResponse $response) {
        try {
            $this->getConnection()->connect();
            $service = new AutenticacionService($this->getConnection());

            $cuenta = trim($request->obtenerParametro('cuenta'));
            $password = trim($request->obtenerParametro('password'));

            $autenticacion = $service->validarCredenciales($cuenta, $password);

            if ($autenticacion['autorizado']) {
                $idUsuario = $autenticacion['idUsuario'];
                $claveSesion = Utils::randomString(32);

                $this->getConnection()->begin();
                $idSesion = $service->registrarSesion($idUsuario, $claveSesion);


                $service = new UsuarioService($this->getConnection());
                $usuario = $service->obtenerUsuario($idUsuario);

                $this->getConnection()->commit();


                $httpSession = new HttpSession(array(
                    'autorizada' => true,
                    'idUsuario' => $idUsuario,
                    'idSesion' => $idSesion,
                    'claveSesion' => $claveSesion,
                    'usuario' => serialize($usuario)
                ));

                $_SESSION['s3ss10n'] = serialize($httpSession);
            }

            $response->initValor('autenticacion', $autenticacion);
            $response->doSuccess();
        } catch (Exception $ex) {
            $response->doError($ex->getTraceAsString());
        } finally {
            $this->getConnection()->disconnect();
            return $response;
        }
    }

    public function terminarSesion(HttpRequest $request, HttpResponse $response) {
        try {
            $this->getConnection()->connect();
            $service = new AutenticacionService($this->getConnection());

            $idSesion = intval($this->getHttpSession()->getAttr('idSesion'));
            
            $_SESSION['s3ss10n'] = null;
            unset($_SESSION['s3ss10n']);
            session_destroy();

            $this->getConnection()->begin();
            $service->terminarSesion($idSesion);
            $this->getConnection()->commit();

            $response->doSuccess();
        } catch (Exception $ex) {
            $response->doError($ex->getTraceAsString());
        } finally {
            $this->getConnection()->disconnect();
            return $response;
        }
    }

}
