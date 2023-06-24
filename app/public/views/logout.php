<?php
/*include_once "admin/controlador/ControlSesion.inc.php"; //Sesion
include_once "admin/clases/ClaseRedireccion.inc.php";
include_once 'admin/clases/ClaseUsuario.inc.php';*/
ControlSesion::cerrar_sesion(); #cerramos sesion de usuario
Redireccion::redirigir(RUTA_LOGIN_GENERAL); # redirigimos al servidor de vuelta