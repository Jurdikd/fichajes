<?php
include_once "../config/config.inc.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";
include_once "../models/conexion.php";
include_once "../libraries/ClaseCrypt.php";
include_once "../libraries/ControlSesion.php";
#Definir variable para url de curl

//Recibimos los datos por json
$get = UrlGetTerror::Getjson();

if (!empty($_SERVER['HTTP_ORIGIN'])) {
    # comprobanos el origin...
    $origin = $_SERVER['HTTP_ORIGIN'];

    // verificamos si get es correcto y esta inciada y no vacia
    if (!empty($get) && SERVIDOR == $origin) {
        #guardamos la variable ficha
        $login = $get['login'];

        // Desglosar los datos del array "ficha"
        $nombre_usuario = $login['username'];
        $pa = $login['password'];
        $id_usuario = 88;
        ControlSesion::iniciar_sesion($id_usuario, $nombre_usuario);
        $respuesta = true;
    } else {
        $respuesta = array('error' => array(
            'message' => array(
                'lang' => array(
                    'en' =>
                    "Error: Empty data",
                    'es' =>
                    "Error: Datos vacíos"
                )
            ),
        ));
    }
} else {
    $respuesta = array('error' => array(
        'message' => array(
            'lang' => array(
                'en' =>
                "Error: Empty url on ORIGIN",
                'es' =>
                "Error: Url vacío en ORIGIN"
            )
        ),
    ));
}
header('Content-Type: application/json'); # declarar documento como json
//Devolvemos la respuesta formato json
echo json_encode($respuesta);
