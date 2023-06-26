<?php
include_once "../config/config.inc.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";
include_once "../models/conexion.php";

#Definir variable para url de curl

//Recibimos los datos por json
$get = UrlGetTerror::Getjson();

if (!empty($_SERVER['HTTP_ORIGIN'])) {
    # comprobanos el origin...
    $origin = $_SERVER['HTTP_ORIGIN'];

    // verificamos si get es correcto y esta inciada y no vacia
    if (!empty($get) && SERVIDOR == $origin) {
        #guardamos la variable ficha
        $ficha = $get['ficha'];

        // Desglosar los datos del array "ficha"
        $primerNombre = $ficha['primer-nombre'];
        $segundoNombre = $ficha['segundo-nombre'];
        $primerApellido = $ficha['primer-apellido'];
        $segundoApellido = $ficha['segundo-apellido'];
        $fechaNacimiento = $ficha['fecha-nacimiento'];
        $sexo = $ficha['sexo'];
        $cedula = $ficha['cedula'];
        $correo = $ficha['correo'];
        $inpreAbogado = $ficha['inpre-abogado'];
        $telefono = $ficha['telefono'];
        $imagen = $ficha['imagen'];
        $delegacion = $ficha['delegacion'];
        $disciplinas = $ficha['disciplinas'];
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