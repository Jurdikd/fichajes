<?php
include_once "../config/config.inc.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";
include_once "../models/conexion.php";
include_once "../models/RepositorioUsuarios.php";
include_once '../libraries/classUsuario.php';
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
        #guardamos la variable login
        $login = $get['login'];
        // Desglosar los datos del array "login"
        $nombre_usuario = $login['username'];
        $password = $login['password'];
        Conexion::abrir_conexion(); //Abrir la conexion
        //verificamos si existe el usuario
        $usuarioExiste = RepositorioUsuario::usuario_existe(Conexion::obtener_conexion(), $nombre_usuario);
        if ($usuarioExiste) {
            # si usuario existe lo buscamos...

            // buscamos usuario por usuario
            $usuario = RepositorioUsuario::obtener_usuario_por_usuario(Conexion::obtener_conexion(), $nombre_usuario);
            // veroficamos la clave 
            $clave = Encriptrar::Verificar_Crytp($password, $usuario->obtener_clave());
            //verificamos si los datos de sesion son correctos
            if ($clave) {
                // DATOS DE SESION CORRECTOS SE INICIA SESION
                ControlSesion::iniciar_sesion($usuario->obtener_id_usuario(), $usuario->obtener_usuario());
                $respuesta = true;
            } else {
                $respuesta = array('error' => array(
                    'message' => array(
                        'lang' => array(
                            'en' =>
                            "Error: Error from data",
                            'es' =>
                            "Error: Error de datos"
                        )
                    ),
                ));
            }
        } else {
            # si usuario no existe...
            $respuesta = array('error' => array(
                'message' => array(
                    'lang' => array(
                        'en' =>
                        "Error: Error from user",
                        'es' =>
                        "Error: Error de usuario"
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
