<?php
//config
include_once "app/config/config.inc.php"; #config general
////////////////////////////////////////////////
//models
include_once "app/models/conexion.php"; # clase conexion
include_once 'app/libraries/classUsuario.php'; #clase usuario
include_once "app/models/RepositorioUsuarios.php";
////////////////////////////////////////////////
//controlers
include_once "app/controllers/users.crt.php"; #controlador usuarios
////////////////////////////////////////////////
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
Conexion::abrir_conexion(); //Abrir la conexion  
// obtener rutas registradas
include_once $router->route();