<?php
include_once "../config/config.inc.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";
include_once "../models/conexion.php";
include_once "../models/RepositorioUsuarios.php";
include_once '../libraries/classUsuario.php';
include_once '../middlewares/middlewares.php';
include_once "../models/RepositorioRegistroUsuarios.php";
include_once "../models/RepositorioEstadosPaises.php";
include_once "../models/RepositorioDisciplinasUsuarios.php";
//controlers
include_once "../libraries/ClaseCrypt.php";
include_once "../libraries/ControlSesion.php";
include_once "../controllers/users.crt.php"; #controlador usuarios

//Recibimos los datos por json
$get = UrlGetTerror::Getjson();

if (!empty($_SERVER['HTTP_ORIGIN'])) {
    # comprobanos el origin...
    $origin = $_SERVER['HTTP_ORIGIN'];

    // verificamos si get es correcto y esta inciada y no vacia
    if (!empty($get) && SERVIDOR == $origin) {
        //abrimos conexion a la base de datos
        Conexion::abrir_conexion();

        if ($get['user'] == "registeruser") {
            //obtenemos los usuarios
            $users = UsersCrt::register_user(Conexion::obtener_conexion(), $get['datauser']);
            //devolvemos los usuarios
            $respuesta = $users;
        } else if ($get['user'] == "getusers") {
            //obtenemos los usuarios
            $users = UsersCrt::GetUsers(Conexion::obtener_conexion(), $get);
            //devolvemos los usuarios
            $respuesta = $users;
        } else if ($get['user'] == "getUser") {
            //obtenemos los usuarios
            $users = UsersCrt::GetUserEdit(Conexion::obtener_conexion(), $get);
            //devolvemos los usuarios
            $respuesta = $users;
        } else if ($get['user'] == "editUser") {
            $respuesta = true;
        } else if ($get['user'] == "deleteUser") {
            $user = UsersCrt::DeleteUser(Conexion::obtener_conexion(), $get);
            $respuesta =  $user;
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

        //$user = UsersCrt::register_user_fichaje(Conexion::obtener_conexion(), $get['ficha']);

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
