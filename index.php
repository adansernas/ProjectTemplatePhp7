<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard Template for Bootstrap</title>

        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/main.css" rel="stylesheet">

        <script src="assets/plugins/jquery/jquery.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">Project name</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?modulo=dashboard">Dashboard</a></li>
                        <li><a href="?modulo=configuraciones">Configuraciones</a></li>
                        <li><a href="?modulo=perfil">Perfil</a></li>
                        <li><a href="?modulo=ayuda">Ayuda</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> 
                                <strong>USUARIO</strong>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="navbar-login">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="text-center">
                                                    <span class="glyphicon glyphicon-user icon-size"></span>
                                                </p>
                                            </div>
                                            <div class="col-lg-8">
                                                <p class="text-left"><strong>Nombre Apellido</strong></p>
                                                <p class="text-left small">correo@email.com</p>
                                                <p class="text-left">
                                                    <a href="?modulo=perfil" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="navbar-login navbar-login-session">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p>
                                                    <a href="?modulo=salir" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="?modulo=dashboard">Dashboard</a></li>
                        <li><a href="?modulo=usuarios">Usuarios</a></li>
                        <li><a href="?modulo=menu">Menu</a></li>
                        <li><a href="?modulo=avisos">Avisos</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <?php
                    $modulo = trim(filter_input(INPUT_GET, 'modulo'));
                    if (!empty($modulo)) {
                        include_once("modulos/{$modulo}/{$modulo}.view.php");
                    } else {
                        include_once("modulos/dashboard/dashboard.view.php");
                    }
                    ?>
                </div>
            </div>
        </div>

    </body>
</html>
