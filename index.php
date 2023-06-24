<?php
include_once "app/config/config.inc.php"; #config general
include_once "app/middlewares/middlewares.php"; #clase libs
include_once "app/helpers/router.helper.php"; #clase router
include_once "app/routes/route.routes.php"; #rutas
include_once "libs/FunctionTerror.libs.php";
include_once "libs/UrlGetTerror.libs.php";
////////////////////////////////////////////////
include_once "app/libraries/ControlSesion.php";
include_once "app/libraries/ClaseRedireccion.php";
/*
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: text/html; charset=utf-8");
*/
// El resto de tu código PHP aquí

// obtener rutas registradas
include_once $router->route();
