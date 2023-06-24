<?php
include_once "../config/config.inc.php";
include_once "../../libs/CurlTerror.libs.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";
include_once "../models/conexion.php";
include_once "../models/RepositorioPaises.php";
include_once "../controllers/paises.crt.php";

#Definir variable para url de curl

//Recibimos los datos por json
$get = UrlGetTerror::Getjson();

if (!empty($_SERVER['HTTP_ORIGIN'])) {
    # comprobanos el origin...
    $origin = $_SERVER['HTTP_ORIGIN'];

    // verificamos si get es correcto y esta inciada y no vacia
    if (!empty($get) && !empty($get['countries']) && SERVIDOR == $origin) {
        #guardamos la variable rates
        $paises = $get['countries'];

        #verificamos los datos que entran
        if ($get['countries'] === "allcountries") {

            $respuesta = PaisesCrt::GetCountries();

            
            //Obtener todas las tasas
            /*$respuesta = array('venezuela' => array(
                'name' => 'Venezuela',
                'iso' => 've',
                'code'=> '+58',
                'flag'=>RUTA_IMG.'img-flags/svg-flags-circular/VE.svg',
                ),
                'colombia' => array(
                'name' => 'Colombia',
                'iso' => 'co',
                'code'=> '+57',
                'flag'=>RUTA_IMG.'img-flags/svg-flags-circular/CO.svg',
                ),
        );*/
        } else {
            $respuesta = array('error' => array(
                'message' => array(
                    'lang' => array(
                        'en' =>
                        "Error: Countrys no corrects",
                        'es' =>
                        "Error: Paises no estan correctas"
                    ),
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