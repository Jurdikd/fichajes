<?php

class ControlSesion
{

    public static function iniciar_sesion($id_usuario, $nombre_usuario)
    {

        if (version_compare(phpversion(), "5.4.0") != -1) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        } else {
            if (session_id() == '') {
                session_start();
            }
        }
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
    }


    public static function cerrar_sesion()
    {
        if (version_compare(phpversion(), "5.4.0") != -1) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        } else {
            if (session_id() == '') {
                session_start();
            }
        }

        if (isset($_SESSION['id_usuario'])) {
            unset($_SESSION['id_usuario']);
        }

        if (isset($_SESSION['nombre_usuario'])) {
            unset($_SESSION['nombre_usuario']);
        }

        session_destroy();
    }

    public static function sesion_iniciada()
    {

        if (version_compare(phpversion(), "5.4.0") != -1) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        } else {
            if (session_id() == '') {
                session_start();
            }
        }


        if (isset($_SESSION['id_usuario']) && isset($_SESSION['nombre_usuario'])) {
            return true;
        } else {
            return false;
        }
    }
    public static function datos_sesion()
    {
        if (version_compare(phpversion(), "5.4.0") != -1) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        } else {
            if (session_id() == '') {
                session_start();
            }
        };

        $datos_sesion = array(
            'id' => $_SESSION['id_usuario'],
            'nombre' => $_SESSION['nombre_usuario']
        );
        return $datos_sesion;
    }
}
