<?php
include_once "../config/config.inc.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";
include_once "../models/conexion.php";
include_once "../models/RepositorioUsuarios.php";
include_once '../libraries/classUsuario.php';
include_once "../models/RepositorioRegistroUsuarios.php";
include_once "../models/RepositorioEstadosPaises.php";
include_once "../models/RepositorioDisciplinasUsuarios.php";
//controlers
include_once "../controllers/users.crt.php"; #controlador usuarios
include_once "../libraries/ControlSesion.php";

//Recibimos los datos por json
$get = UrlGetTerror::Getjson();

if (!empty($_SERVER['HTTP_ORIGIN'])) {
    # comprobanos el origin...
    $origin = $_SERVER['HTTP_ORIGIN'];

    // verificamos si get es correcto y esta inciada y no vacia
    if (!empty($get) && SERVIDOR == $origin) {
        Conexion::abrir_conexion();
        #guardamos la variable ficha

        if ($get['ficha'] == "getfichas") {

            $ficha = UsersCrt::GetFichas(Conexion::obtener_conexion(), $get);
            $respuesta = $ficha;
        } else if ($get['ficha'] == "getfichasdiscipline") {

            $ficha = UsersCrt::GetFichas(Conexion::obtener_conexion(), $get);
            $respuesta = $ficha;
        } else {
            $respuesta = array('error' => array(
                'message' => array(
                    'lang' => array(
                        'en' =>
                        "Error: Error get",
                        'es' =>
                        "Error: Error de solicitud"
                    )
                ),
            ));
        }
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
